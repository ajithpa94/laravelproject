 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <title>Laravel 8 CRUD Tutorial From Scratch</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 </head>

 <body>
     <div class="container mt-2">
         <div class="row">
             <div>
                 <div class="col-lg-12 margn-tb">
                     <h2>laravel project</h2>


                 </div>
                 <div class="pull-right mb-2">
                     <a class="btn btn-success" href="{{ route('companies.create') }}">create c</a>

                 </div>
             </div>
         </div>
         @if ($message = Session::get('success'))
             <div class="alert alert-success">
                 <p>{{ $message }}</p>

             </div>
         @endif
         <table class="table table-bordered">
             <tr>
                 <th>s.no</th>
                 <th>Company Name</th>
                 <th>Company email</th>
                 <th>company paasword</th>
                 <th>Company address</th>
                 <th>Company type</th>
                 <th>Company select</th>
                 <th>Company check</th>
                 <th>Company image</th>
                 <th width="280px">Action</th>
             </tr>
             @foreach($companies as $company)
             <tr>
                 <td>{{ $company->id }}</td>
                 <td>{{ $company->name }}</td>
                 <td>{{ $company->email }}</td>
                 <td>{{ $company->password }}</td>
                 <td>{{ $company->address }}</td>
                 <td>{{ $company->types }}</td>
                 <td>{{ $company->seclect }}</td>
                 <td>{{ $company->check }}</td>
                
                 <td><img src="{{'public/image/'.$company->image}}" alt="" style="height: 50px;width:50px"></td>
                 <td>
                     <form action="{{ route('companies.destroy', $company->id) }}" method="post">
                         <a class="btn btn-primary" href="{{ route('companies.edit', $company->id) }}">Edit</a>
                         @csrf
                         @method('DELETE')
                         <button type="submit" class="btn btn-danger">Delete</button>

                     </form>
                 </td>
             </tr>
             @endforeach
         </table>
         {!! $companies->links() !!}
     </div>
 </body>

 </html>
