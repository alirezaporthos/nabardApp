@extends('dashboard.layout.app')


@section('title')
       ویرایش تیم
@endsection


@section('body')

    <!-- Main Content Area -->
    <div class="main-content">
        <!-- Basic Form area Start -->
        <div class="container-fluid">
            <!-- Form row -->
            <div class="row">

                <div class="col-xl-12 box-margin height-card">
                    <div class="card card-body" style="background-color: whitesmoke">
                        <h4 class="card-title">ویرایش تیم</h4>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form action="{{route('dashboard.teams.update',$team->id)}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="title" class="col-form-label">عنوان </label>
                                            <input type="text" class="@error('title') is-invalid @enderror form-control"
                                                   id="title" name="title" value="{{old('item',$team->title)}}">
                                            @error('title')
                                            <span class="text-danger" role="alert">
                                                   <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="first_member" class="col-form-label">نام عضو اول </label>
                                            <input type="text" class="@error('first_member') is-invalid @enderror form-control"
                                                   id="first_member" name="first_member" value="{{old('item',$team->first_member)}}">
                                            @error('first_member')
                                            <span class="text-danger" role="alert">
                                                   <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="mobile" class="col-form-label">شماره</label>
                                            <input type="text" class="@error('mobile') is-invalid @enderror form-control"
                                                   id="mobile" name="mobile" value="{{old('item',$team->mobile)}}">
                                            @error('mobile')
                                            <span class="text-danger" role="alert">
                                                   <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="email" class="col-form-label">ایمیل</label>
                                            <input type="text" class="@error('email') is-invalid @enderror form-control"
                                                   id="email" name="email" value="{{old('item',$team->email)}}">
                                            @error('email')
                                            <span class="text-danger" role="alert">
                                                   <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        @if(count($team->teamMembers)>0)
                                            <label for="teamMember" class="col-form-label">نام باقی اعضا:</label>
                                            @foreach ($team->teamMembers as $teamMember)
                                                <div class="form-group col-md-3">
                                                <input type="text" class="form-control" id="teamMember"  value="{{$teamMember->name}}" disabled>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="form-row">
                                        <label class="col-form-label"> فایل ها:</label>
                                        <div class="col-md-1">
                                            <a class="btn btn-danger btn-circle" onclick="fileDownload('{{$team->video,$team->id}}')"> video</a>
                                        </div>
                                        <div class="col-md-1">
                                            <a class="btn btn-danger btn-circle" onclick="fileDownload('{{$team->pdf,$team->id}}')"> pdf</a>
                                        </div>
                                        <div class="col-md-1">
                                            <a class="btn btn-danger btn-circle" onclick="fileDownload('{{$team->app,$team->id}}')"> App</a>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <a  class="btn btn-warning mr-2 " href="({{route('dashboard.teams.destroy',$team->id)}})">حذف</a>

                                        <button type="submit" class="btn btn-primary mr-2 ">ثبت</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->
        </div>

@endsection
@section('script')


<script>
function fileDownload(filePath,id){

    $.ajax({

        type: 'post',
        url: '/teams/download',
        data: {
            'filePath': 'static/'+filePath,
            'id': id,
            "_token":'{{ csrf_token() }}'
        },success: function (response) {
            window.open(response.src, '_blank')
        }

    })
}
</script>



@endsection

