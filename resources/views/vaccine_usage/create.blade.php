@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">take vaccine</div>

                        <div class="card-body">
                            <form action="{{ route('usage.store')}}" method="post">
                                @csrf

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Vaccine Name</label>

                            <div class="col-md-6">
                                <select name="vaccine_id" class="form-control">
                                 <option value="">Select</option>
                                        @foreach($vaccine_list as $vaccine)
                                            <option value="{{ $vaccine->id }}" @if(old('vaccine') === $vaccine->id) selected @endif>{{ $vaccine->vaccine_name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="taken_doses" class="col-md-4 col-form-label text-md-right">taken doses</label>

                            <div class="col-md-6">
                                <input  type="number" class="form-control " name="taken_doses" value="" >
                            </div>
                        </div>
                                <div class="form-group row">
                            <label for="remaining_doses" class="col-md-4 col-form-label text-md-right">remaining doses</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="remaining_doses" value=" " >
                            </div>
                        </div>

                                 <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-block btn-primary">Take</button>
                                        </div>
                                 </div>

                            </form>
                        </div>
                    </div>
        </div>
    </div>

</div>

@endsection
