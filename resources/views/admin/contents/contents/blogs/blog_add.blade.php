@extends('admin.layouts.templates.panel')
@section('title','Blogs')
@section('sub-title','Add')
@section('content')
    				<!--begin::Toolbar-->
                    <div class="d-flex flex-wrap flex-stack mb-6">
                        <!--begin::Heading-->
                        <h3 class="fw-bolder my-2">Blog Add</h3>
                        <!--end::Heading-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-wrap my-2">
                            <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm" >Back to List</a>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Toolbar-->

                    <!--begin::Row-->
                    <div class="row gy-5 g-xl-8">
                        <!--begin::Col-->
                        <div class="col-xl-12">
                            <!--begin::Basic info-->
								<div class="card mb-5 mb-xl-10">
									
									<!--begin::Content-->
									<div id="kt_account_profile_details" class="collapse show">
                                        @livewire('admin.contents.blog-add',['list'=>'blog'])
									</div>
									<!--end::Content-->
								</div>
								<!--end::Basic info-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                   
@endsection
@section('js')
<script src="/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>


<script>
   ClassicEditor
        .create(document.querySelector('#message'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                let message = editor.getData();
                Livewire.emit('typeCKeditor', message)
            })
        })
        .catch(error => {
            console.error(error);
        });

</script>
@endsection
