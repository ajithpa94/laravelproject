<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Company Form - Laravel  CRUD</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left-mb-2">
<h2>Add Comapany</h2>
                </div>
                <div class="pull-right">
                    <a calass="btn btn-primary"href="{{route('companies.index')}}">back</a>

                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{session('status')}}
        </div>
        @endif
        <form action="{{route('companies.store')}}"method="post"enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        
                        <strong>Company Name:</strong>
                        <input type="text" name="name"class="form-control"placeholder="enter name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            
                        @enderror

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        
                        <strong>Company Email:</strong>
                        <input type="email" name="email"class="form-control"placeholder="enter email">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            
                        @enderror

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">                        
                        <strong>Company password:</strong>
                        <input type="password" name="password"class="form-control"placeholder="enter password">
                        @error('password')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>                           
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        
                        <strong>Company address:</strong>
                        <input type="text" name="address"class="form-control"placeholder="enter address">
                        @error('address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            
                        @enderror

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        
                        <strong>Company types:</strong>
                        <select class="form-control" required name="type">
                            <option value="">Select User Type</option>
                            @foreach ($jobs as $Row)
                                <option value="{{ $Row->id }}">{{ $Row->type }}</option>
                            @endforeach
                        </select>
                        @error('address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            
                        @enderror

                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        
                        <strong>Company select:</strong><br>
                        <input type="radio" name="gender" value="male">male<br>
                        <input type="radio" name="gender" value="female">female<br>
                        <input type="radio" name="gender" value="other">other<br>
                        @error('address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            
                        @enderror

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        
                        <strong>Company check:</strong><br>
                        <input type="checkbox" name="check" ><samp style="color: darkgreen">Term And Condition</samp>
                        
                        @error('check')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            
                        @enderror

                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        
                        <strong>Company image:</strong>
                        <input type="file" name="image"class="form-control"placeholder="upload">
                        @error('image')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            
                        @enderror

                    </div>
                </div>

                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>