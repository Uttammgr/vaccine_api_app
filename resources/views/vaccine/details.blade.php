@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-7">

                <div class="card">

                <div class="card-header">vaccine details</div>

                    <div class="card-body">
                       <div class="form-group row">
                         <label for="vaccine_name" class="col-md-4 col-form-label text-md-right">{{ __('Vaccine Name') }}  :</label>

                         <div class="col-md-6 col-sm-10">
                            <strong>{{$vaccines->vaccine_name}}</strong>
                         </div>
                       </div>

                        <div class="form-group row">
                             <label for="vaccine_description" class="col-md-4 col-form-label text-md-right">{{ __('Vaccine Description') }} :</label>

                             <div class="col-md-6">
                                <strong>{{$vaccines->vaccine_description}}</strong>
                             </div>
                       </div>
                   <div class="form-group row">
                         <label for="vaccine_side_effect" class="col-md-4 col-form-label text-md-right">{{ __('Vaccine side effect') }} :</label>

                         <div class="col-md-6">
                            <strong>{{$vaccines->vaccine_side_effect}}</strong>
                         </div>
                   </div>

                   <div class="form-group row">
                     <label for="diseases_description" class="col-md-4 col-form-label text-md-right">{{ __('Diseases Description') }} :</label>

                     <div class="col-md-6">

                        <strong>{{$vaccines->diseases_description}}</strong>

                     </div>
                   </div>

                   <div class="form-group row">
                     <label for="qualified_candidate" class="col-md-4 col-form-label text-md-right">{{ __('Qualified candidate') }} :</label>

                     <div class="col-md-6">
                        <strong>{{$vaccines->qualified_candidate}}</strong>
                     </div>
                   </div>

                   <div class="form-group row">
                       <label for="disqualified_candidate" class="col-md-4 col-form-label text-md-right">{{ __('Disqualified candidate') }} :</label>

                     <div class="col-md-6">
                        <strong>{{$vaccines->disqualified_candidate}}</strong>
                     </div>
                   </div>


                   <div class="form-group row">
                     <label for="precautions" class="col-md-4 col-form-label text-md-right">{{ __('Precautions') }} :</label>

                     <div class="col-md-6">
                        <strong>{{$vaccines->precautions}}</strong>
                     </div>
                   </div>

                   <div class="form-group row">
                     <label for="required_doses" class="col-md-4 col-form-label text-md-right">{{ __('Required doses') }} :</label>

                     <div class="col-md-6">
                        <strong>{{$vaccines->required_doses}}</strong>
                     </div>
                   </div>

                   <div class="form-group row">
                     <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}:</label>

                     <div class="col-md-6">
                        <strong>{{$vaccines->age}}</strong>
                     </div>
                   </div>

                    <div class="form-group row mb-0">

                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('vaccine.index')}}"><button class="btn btn-lg btn-primary">Back</button></a>
                        </div>
                    </div>
                 </div>
            </div>

            </div>

        </div>
    </div>

@endsection
