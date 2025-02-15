@extends('frontend.layouts.app')
@section('title', 'Company List')

@section('content')
<div class="flex flex-col min-h-screen">
    <div class="container mx-auto mt-5">
        <h1 class="text-3xl font-bold mb-5">Companies</h1>
        <div class="w-full h-0.5 bg-gray-300 mb-4"></div> <!-- Underline Ruler -->

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($companies as $company)
            <div class="bg-white border border-gray-200 p-5 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <div class="flex items-center space-x-4 mb-4">
                    <div class="w-16 h-16 overflow-hidden rounded-full">
                        @if(isset($company->logo))
                            <img src="{{ asset($company->logo) }}" alt="Logo" class="w-full h-full object-cover">
                        @else
                            <img src="{{ asset('frontend/assets/media/avatars/blank.png') }}" alt="Logo" class="w-full h-full object-cover">
                        @endif
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800">{{ $company->company_name ?? '' }}</h2>
                </div>
                <div class="text-gray-600 text-sm flex items-center">
                    <i class="fa fa-map-marker-alt text-gray-500 mr-1"></i>
                    {{ $countryData->country_name ?? '' }}
                </div>
                <a href="{{ route('company.company-details', ['company_id' => $company->company_id]) }}" target="_self" class="mt-4 inline-block w-full text-center bg-green-500 text-white py-4 rounded-lg shadow hover:bg-green-600 transition">View Details</a>
            </div>
            @endforeach
        </div>
        <div class="mt-6">{{ $companies->links() }}</div>
    </div>
</div>
@endsection

@push('custom_scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            const value = $(this).val();
            if(value) {
                $('.search_list').show();
                $.ajax({
                    url: "{{ url('/company-list') }}",
                    type: 'GET',
                    data: {
                        'search': value,
                        'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                    },
                    success: function(data) {
                        let suggestions = '';
                        if(data.suggestions.length > 0) {
                            data.suggestions.forEach(company => {
                                suggestions += `<div class='cursor-pointer p-2 hover:bg-gray-100' data-title='${company}'>${company}</div>`;
                            });
                        } else {
                            suggestions = '<div class="p-2 text-gray-500">No suggestions found</div>';
                        }
                        $('.search_list').html(suggestions).show();
                        $('.company_list').html(data.html);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            } else {
                $('.search_list').html('').hide();
            }
        });
    });
    $(document).on('click', '.suggestion-item', function() {
        $('#search').val($(this).data('title'));
        $('.search_list').html('').hide();
    });
</script>
@endpush