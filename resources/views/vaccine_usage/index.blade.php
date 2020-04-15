@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12">

            <div class="row justify-content-center">
                <div class="col4 mb-4">
                <a href=" {{route('usage.create')}} ">
                    <button class="btn btn-primary">Take vaccine</button></a>
            </div>

            </div>
                    <div class="card">
                        <div class="card-header">Taken Vaccine list</div>

                        <div class="card-body">

                            <table class="table">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Vaccine Name</th>
                                  <th scope="col">Required Doses</th>
                                  <th scope="col">Doses Taken</th>
                                  <th scope="col">remaining Doses</th>
                                  <th scope="col">Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                 @forelse($userVaccines  as $key =>  $used)
                                     <tr>
                                          <th>{{ $key+1}}</th>
                                          <td>{{$used->vaccines->vaccine_name}}</td>
                                          <td>{{$used->vaccines->required_doses}}</td>
                                          <td>{{$used->taken_doses}}</td>
                                          <td>{{$used->remaining_doses}}</td>
                                         <td>
                                             <form action="{{ route('usage.destroy', $used->id)  }}" method="post">

                                                 <a href="{{route('usage.edit', $used->id)}}">  <button type="button" class="btn btn-outline-primary">Edit</button> </a>
                                                 @csrf
                                                 @method('DELETE')
                                                 @can('manage-users')
                                                 <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                 @endcan
                                             </form>
                                         </td>
                                         @empty<td>no record found</td>
                                     </tr>
                                 @endforelse


                              </tbody>
                            </table>

                        </div>
                    </div>
        </div>
    </div>

</div>
@endsection
