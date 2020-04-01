@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12">

            <div class="row justify-content-center">
                <div class="col4 mb-4">
                <a href=" {{route('vaccine.create')}} ">
                    <button class="btn btn-primary">Add new vaccine</button></a>
            </div>

            </div>
                    <div class="card">
                        <div class="card-header">Vaccine listing</div>

                        <div class="card-body">

                            <table class="table">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Vaccine Name</th>
                                  <th scope="col">Qualified Candidate</th>
                                  <th scope="col">Required Doses</th>
                                  <th scope="col">Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                 @foreach ($vaccines  as  $vaccine)
                                     <tr>
                                          <th>{{ $vaccine->id }}</th>
                                          <td>{{$vaccine->vaccine_name}}</td>
                                          <td>{{$vaccine->qualified_candidate}}</td>
                                          <td>{{$vaccine->required_doses}}</td>
                                         <td>

                                             <form action="{{route('vaccine.destroy', $vaccine->id)}}" method="post">
                                                 <a href="{{route('vaccine.show', $vaccine->id)}}">  <button type="button" class="btn btn-outline-primary">Details</button> </a>
                                                @can('manage-users')
                                                 <a href="{{route('vaccine.edit', $vaccine->id)}}">  <button type="button" class="btn btn-outline-primary">Edit</button> </a>
                                                 @csrf
                                                 @method('DELETE')
                                                 <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                 @endcan
                                             </form>

                                         </td>
                                     </tr>
                                 @endforeach


                              </tbody>
                            </table>

                        </div>
                    </div>
        </div>
    </div>

</div>
@endsection
