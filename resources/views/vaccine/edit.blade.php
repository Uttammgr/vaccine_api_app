@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-xl-12">
                 <form action="{{route('vaccine.update', $vaccines->id)}}" method="post" >
                @csrf
                     @method('PUT')

                <div class="card">

                <div class="card-header">Edit vaccine details</div>

                    <div class="card-body">
                       <div class="form-group row">
                         <label for="vaccine_name" class="col-md-4 col-form-label text-md-right">{{ __('Vaccine Name') }}</label>

                         <div class="col-md-6 col-sm-10">
                           <input id="vaccine_name" type="text" class="form-control @error('vaccine_name') is-invalid @enderror" name="vaccine_name" value="{{ $vaccines->vaccine_name }}" required autocomplete="user_name" autofocus>

                           @error('vaccine_name')
                           <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                         </div>
                       </div>

                        <div class="form-group row">
                             <label for="vaccine_description" class="col-md-4 col-form-label text-md-right">{{ __('Vaccine Description') }}</label>

                             <div class="col-md-6">

                               <textarea class="form-control" name="vaccine_description" rows="4"> {{$vaccines->vaccine_description}}</textarea>

                               @error('vaccine_description')
                               <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                               </span>
                               @enderror
                             </div>
                       </div>
                   <div class="form-group row">
                         <label for="vaccine_side_effect" class="col-md-4 col-form-label text-md-right">{{ __('Vaccine side effect') }}</label>

                         <div class="col-md-6">
                           <textarea class="form-control" name="vaccine_side_effect" rows="4">{{$vaccines->vaccine_side_effect}}</textarea>

                           @error('vaccine_side_effect')
                           <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                         </div>
                   </div>

                   <div class="form-group row">
                     <label for="diseases_description" class="col-md-4 col-form-label text-md-right">{{ __('Diseases Description') }}</label>

                     <div class="col-md-6">
                       <textarea class="form-control" name="diseases_description" rows="4">{{$vaccines->diseases_description}}</textarea>

                       @error('diseases_description')
                       <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                     </div>
                   </div>

                   <div class="form-group row">
                     <label for="qualified_candidate" class="col-md-4 col-form-label text-md-right">{{ __('Qualified candidate') }}</label>

                     <div class="col-md-6">
                       <input id="qualified_candidate" type="text" class="form-control @error('qualified_candidate') is-invalid @enderror" name="qualified_candidate" value="{{$vaccines->qualified_candidate}}" required autocomplete="qualified_candidate" autofocus>

                       @error('qualified_candidate')
                       <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                     </div>
                   </div>
                   <div class="form-group row">
{{--                     <label for="disqualified_candidate" class="col-md-4 col-form-label text-md-right">{{ __('Disqualified candidate') }}</label>--}}
                       <label for="disqualified_candidate" class="col-md-4 col-form-label text-md-right">{{ __('Disqualified candidate') }}</label>

                     <div class="col-md-6">
                       <input id="disqualified_candidate" type="text" class="form-control @error('disqualified_candidate') is-invalid @enderror" name="disqualified_candidate" value="{{$vaccines->disqualified_candidate }}" required autocomplete="disqualified_candidate" autofocus>

                       @error('disqualified_candidate')
                       <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                     </div>
                   </div>
                   <div class="form-group row">
                     <label for="precautions" class="col-md-4 col-form-label text-md-right">{{ __('Precautions') }}</label>

                     <div class="col-md-6">

                       <textarea class="form-control" name="precautions" rows="4">{{$vaccines->precautions}}</textarea>

                       @error('precautions')
                       <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                     </div>
                   </div>

                   <div class="form-group row">
                     <label for="required_doses" class="col-md-4 col-form-label text-md-right">{{ __('Required doses') }}</label>

                     <div class="col-md-6">
                       <input id="required_doses" type="number" class="form-control @error('required_doses') is-invalid @enderror" name="required_doses" value="{{ $vaccines->required_doses }}" required autocomplete="required_doses" autofocus>

                       @error('required_doses')
                       <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                     </div>
                   </div>
                   <div class="form-group row">
                     <label for="taken_doses" class="col-md-4 col-form-label text-md-right">{{ __('Taken doses') }}</label>

                     <div class="col-md-6">
                       <input id="taken_doses" type="number" class="form-control @error('taken_doses') is-invalid @enderror" name="taken_doses" value="{{ $vaccines->taken_doses }}" required autocomplete="taken_doses" autofocus>

                       @error('taken_doses')
                       <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                     </div>
                   </div>

                   <div class="form-group row">
                     <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                     <div class="col-md-6">
                       <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ $vaccines->age }}" required autocomplete="age" autofocus>

                       @error('age')
                       <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                     </div>
                   </div>

                    <div class="form-group row mb-0">

                        <div class="col-md-6 offset-md-6">
                            <button type="submit" class="btn btn-lg btn-primary">Edit</button>
                        </div>
                    </div>
                 </div>
            </div>
                 </form>
            </div>

        </div>
    </div>

@endsection
