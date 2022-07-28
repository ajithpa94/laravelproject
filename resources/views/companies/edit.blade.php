<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Company Form - Laravel 8 CRUD Tutorial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>edit company</h2>


                </div>
                <div class="pull-right">
                    <a class="btn btn-parimary" href="{{ route('companies.index') }}"
                        enctype="multipart/form-data">back</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('stsatus') }}
            </div>
        @endif
        <form action="{{ route('companies.update', $company->id) }}"method="post"enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company name:</strong>
                        <input type="text" name="name" value="{{ $company->name }}"class="form-control"
                            placeholder="comapany name">
                        @error('name')
                            <div class="alert alert-dangerb mt-1 mb-1">{{ $company->name }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company email:</strong>
                        <input type="email" name="email" value="{{ $company->email }}"class="form-control"
                            placeholder="comapany email">
                        @error('email')
                            <div class="alert alert-dangerb mt-1 mb-1">{{ $company->email }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company password:</strong>
                        <input type="password" name="password" value="{{ $company->password }}"class="form-control"
                            placeholder="comapany password">
                        @error('password')
                            <div class="alert alert-dangerb mt-1 mb-1">{{ $company->password }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company address:</strong>
                        <input type="text" name="address" value="{{ $company->address }}"class="form-control"
                            placeholder="comapany address">
                        @error('address')
                            <div class="alert alert-dangerb mt-1 mb-1">{{ $company->address }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">

                        <strong>Company types:</strong>
                        <select class="form-control" required name="type">
                            <option value="">Select User Type</option>
                            @foreach ($jobs as $Row)
                                <option @if ($Row->id == $company->types) selected @endif value="{{ $Row->id }}">
                                    {{ $Row->type }}</option>
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
                        <input type="radio" @if ($company->seclect == 'male') checked @endif name="gender"
                            value="male">male<br>
                        <input type="radio" @if ($company->seclect == 'female') checked @endif name="gender" value="female">female<br>
                        <input type="radio" @if ($company->seclect == 'other') checked @endif name="gender" value="other">other<br>
                        @error('address')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">

                        <strong>Company check:</strong><br>
                        <input type="checkbox"@if ($company->check) checked @endif name="check" value="{{ $company->check }}"><samp style="color: darkgreen">Term And Condition</samp>
                        @error('check')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror

                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">

                        <strong>Company image:</strong>
                        <input type="file" name="image"class="form-control"placeholder="upload" value="{{ $company->image }}">
                        
                        @error('image')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror

                    </div>
                    <img src="{{ asset('public/image/'.$company->image)}}" alt="" style="height:50px;width:50px">
                 
                </div>
                <button type="submit" class="btn btn-primary ml-3">submit</button>
            </div>
        </form>
    </div>
</body>

</html>
