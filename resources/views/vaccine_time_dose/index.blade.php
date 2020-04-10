@extends('layouts.app')

@section('title', 'Vaccine Dose Marker')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">

                    <div class="row justify-content-center">
                        @can('manage-users')
                        <div class="col4 mb-4">
                            <a href=" {{route('vaccine_time.create')}} "><button class="btn btn-primary">Add time / dose</button></a>
                        </div>
                        @endcan
                    </div>


                        <div class="card">
                            <div class="card-header">List of Time and doses for Vaccine</div>

                            <div class="card-body">

                                <table class="table">
                                      <thead class="thead-dark">
                                        <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Vaccine Name</th>
                                          <th scope="col">Starting Age</th>
                                          <th scope="col">Ending Age</th>
                                          <th scope="col">Dose Marker</th>
                                          <th scope="col">Actions</th>
                                        </tr>
                                      </thead>

                                     <tbody>
                                     @forelse($dose_times as $key => $lists)
                                      <tr>
                                          <th>{{ $key +1 }}</th>
                                          <td>{{$lists->vaccines->vaccine_name}}</td>
                                          <td>{{$lists->age_start}}</td>
                                          <td>{{$lists->age_end}}</td>
                                          <td>{{$lists->dose}}</td>
                                          <td>
                                              @can('manage-users')
                                              <form action="{{ route('vaccine_time.destroy', $lists->id)  }}" method="post">
                                                  <a href="{{route('vaccine_time.edit', $lists ->id)}}">  <button type="button" class="btn btn-outline-primary">Edit</button> </a>
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="btn btn-outline-danger">Delete</button>
                                              </form>
                                              @endcan
                                          </td>
                                           @empty <td>no record found</td>
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
