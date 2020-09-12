@extends('layouts.app')
@section('content')
<div class="container Theme">
 <div class="row justify-content-center">
  <div class="col-sm-12">
  <h1 class="text-center heading-color">Authentication with roles</h1>
      <table class="table table-hover table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col" >Roles</th>
            <th scope="col">Actions</th>            
          </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
            <th scope="row"> {{$user->id}} </th>
            <td> {{$user->name}} </td>
            <td> {{$user->email}} </td>
            <th> {{ implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</th>
            <td> 
               @can('edit-users')
                 <a href="{{route('admin.users.edit',$user->id)}}"><button type="button" class="btn-primary float-left"><span> <i class="fas fa-edit"></i>Edit </span></button></a>
            <form action="{{route('admin.users.destroy',$user)}}" method="POST" class="float-left">
            @csrf
            {{ method_field('DELETE') }}
            <button  type="submit" class="btn-warning"> <span> <i class="fa fa-trash" aria-hidden="true"></i>Delete</span> </button>
            </form>
            @endcan
            </td>
          </tr>      
        @endforeach
        </tbody>
      </table>      
  </div>
 </div>
</div>
@endsection