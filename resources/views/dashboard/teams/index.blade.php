@extends('dashboard.layout.app')

@section('title')
    مدیریت تیم ها
@endsection
@section('body')
<div class="container-fluid">
    <!-- Form row -->
    <div class="row">

        <div class="col-xl-12 box-margin height-card">
            <div class="card" >
                <div class="card-body">
                    <h4 class="card-title"> فیلتر </h4>
                    <form action="{{route('dashboard.teams.index')}}" method="get">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="register" class="col-form-label">نام تیم</label>
                                <input class="@error('title') is-invalid @enderror form-control" id="title" value="{{ old('title',request()->title) }}" name="title">
                                @error('title')
                                <span class="text-danger" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                            </div>
                            <div class="form-group col-md-6">
                                <label for="first_member" class="col-form-label"> اسم نفر اول</label>
                                <input type="text" class="@error('mobile') is-invalid @enderror form-control"  value="{{ old('first_member',request()->first_member) }}" id="first_member" name="first_member">
                                @error('first_member')
                                <span class="text-danger" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary btn-block">جستجو</button>

                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div>

        <div class="col-xl-12 box-margin">
            <div class="card" >
                <div class="card-body">
                    <h4 class="card-title mb-2">لیست تیم ها </h4>

                    <div class="table-responsive text-center">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        عنوان
                                    </th>
                                    <th>
                                        نام عضو اول
                                    </th>
                                    <th>
                                        فایل اپلیکیشن
                                    </th>
                                    <th>
                                        فایل pdf ارائه
                                    </th>

                                    <th>
                                        فایل تصویری ارائه
                                    </th>
                                    <th>
                                        ویرایش
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($teams as $team)
                                    <tr>
                                        <td>
                                            {{$loop->iteration}}
                                        </td>
                                        <td>
                                            {{$team->title}}
                                        </td>
                                        <td>
                                            {{$team->first_member}}
                                        </td>
                                        <td>
                                            <button class="btn btn-success btn-circle" onclick="fileDownload('{{$team->app,$team->id}}')"> App</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-circle" onclick="fileDownload('{{$team->pdf,$team->id}}')"> pdf</button>
                                        </td>

                                        <td class="text-center">
                                        <button class="btn btn-primary btn-circle" onclick="fileDownload('{{$team->video,$team->id}}')"> video</button>

                                        </td>
                                        <td>

                                            <a href="{{route('dashboard.teams.edit',$team->id)}}">
                                                    <span class="btn btn-danger">ویرایش</span>
                                            </a>

                                        </td>
                                    </tr>
                                    @empty
                                    <p>تیمی یافت نشد!</p>
                                 @endforelse
                            </tbody>
                        </table>

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
        url: 'teams/download',
        data: {
            'filePath': filePath,
            'id': id,
            "_token":'{{ csrf_token() }}'
        },success: function (response) {
            window.open(response.src, '_blank')
        }

    })
}
</script>

@endsection
