@extends('layouts.app')

@section('content')

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Tables</h2>
            </div>
        </div>
    </div>

    <!-- Notice
    <div class="row">
        <div class="col-md-12">
            <div class="notification success closeable margin-bottom-30">
                <p>Your listing <strong>Hotel Govendor</strong> has been approved!</p>
                <a class="close" href="#"></a>
            </div>
        </div>
    </div> -->

    <!-- Content -->

    @if(isset($restaurantTables))

    <div class="row">

        <div class="col-md-12">
            @if(count($restaurantTables) < 1)
                <h4>No tables found.</h4>
            @else

                <div class="add-listing">
                    <div class="add-listing-section">
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-doc"></i>Tables List ({{ \App\Restaurant::where('code', $code)->first()->name }})</h3>
                        </div>

                        <table id="pricing-list-container">
                            <tbody>
                                @foreach($restaurantTables as $key => $restaurantTable)

                                    <tr class="pricing-list-item pattern ui-sortable-handle">
                                        <td>
                                            <div class="fm-input pricing-name"><input type="text" placeholder="" value="{{ $restaurantTable->name }}" disabled></div>

                                            <div class="fm-input pricing-ingredients"><input type="text" placeholder="" value="{{ $restaurantTable->capacity.' Person(s)' }}" disabled></div>

                                                <form method="POST" action="{{ route('tables.edit') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $restaurantTable->id }}">
                                                    <button class="button"><i class="sl sl-icon-note"></i></button>
                                                </form>

                                                <form method="POST" action="{{ route('tables.delete') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $restaurantTable->id }}">
                                                    <button class="button"><i class="sl sl-icon-close"></i></button>
                                                </form>  
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            @endif
            <a href="{{ route('tables.add', $code) }}" class="button">Add Table</a>
        </div>
    </div>
    @endif

<!-- Copyrights -->
<div class="col-md-12">
    <div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
</div>

@endsection
