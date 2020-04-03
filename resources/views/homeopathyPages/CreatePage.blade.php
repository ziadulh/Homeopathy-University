@extends('admin.app')

@section('content')

@include('Messages.message')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Create Page</h3>
                    </div>

                    <form role="form" action="/pages" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="text" class="form-control" id="description" name="description" value="{{old('description')}}"><?php echo htmlspecialchars(old('description'));?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="photo">Upload a Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo">
                            </div>

                            <div class="form-group">
                                <label for="third_party_code">Third Party Code</label>
                                <textarea type="text" class="form-control" id="third_party_code" name="third_party_code" value="{{old('third_party_code')}}"><?php echo htmlspecialchars(old('third_party_code'));?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="publish">Published</label>
                                <select type="text" class="form-control" id="publish" name="publish">
                                    <option value= 1 >Yes
                                    <option value= 0>No
                                </select>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
