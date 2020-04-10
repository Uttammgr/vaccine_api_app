@extends('layouts.app')

@section('title', 'create dose and time ')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">add new</div>

                        <div class="card-body">
                            <form action="{{ route('vaccine_time.index')}}" method="post">
                                @csrf

                                <div class="form-group row">
                                    <label for="gender" class="col-md-4 col-form-label text-md-right">Vaccine Name</label>

                                    <div class="col-md-6">
                                        <select name="vaccine_id" class="form-control">
                                         <option value="">Select</option>
                                                @foreach($list_vaccines as $vaccine)
                                                    <option value="{{ $vaccine->id }}" @if(old('vaccine') === $vaccine->id) selected @endif>{{ $vaccine->vaccine_name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="age_start" class="col-md-4 col-form-label text-md-right">Starting Age</label>

                                    <div class="col-md-6">
                                        <input  type="number" class="form-control " name="age_start" value="" >
                                    </div>
                            </div>

                                <div class="form-group row">
                                    <label for="age_end" class="col-md-4 col-form-label text-md-right">Ending Age</label>

                                    <div class="col-md-6">
                                        <input  type="number" class="form-control " name="age_end" value="" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="dose" class="col-md-4 col-form-label text-md-right">Dose Marker</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="dose" value="" >
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-block btn-primary">add</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
        </div>
    </div>

</div>
@endsection

