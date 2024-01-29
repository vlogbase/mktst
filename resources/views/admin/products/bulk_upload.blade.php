@extends('admin.layouts.templates.panel')
@section('title', 'Product')
@section('sub-title', 'Upload')
@section('content')
    <!--begin::Toolbar-->
    <div class="d-flex flex-wrap flex-stack mb-6">
        <!--begin::Heading-->
        <h3 class="fw-bolder my-2">Upload Product</h3>
        <!--end::Heading-->
        <!--begin::Actions-->
        <div class="d-flex flex-wrap my-2">
            <a href="{{ route('admin.products.list') }}" class="btn btn-primary btn-sm">Back to List</a>
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Row-->
    <div class="row gy-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-xl-12">

            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_profile_details1" aria-expanded="true"
                    aria-controls="kt_account_profile_details1">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Image Asset Uploader</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_profile_details1" class="collapse">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p>To bulk upload images to our system, first ensure all images are in JPEG, PNG or WEBP format and are named appropriately. After selecting, confirm the upload and wait for the process to complete. Once uploaded, the images will be associated with their respective products and categories</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Content-->
            </div>


            <!--begin::Basic info-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_profile_details3" aria-expanded="true"
                    aria-controls="kt_account_profile_details3">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Download CSV Template</h3>
                        <p></p>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_profile_details3" class="collapse">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>How to Upload Products Using a CSV File</h2>
                                <p>Uploading products to our e-commerce platform is streamlined and efficient using a CSV
                                    file. Here’s a simple guide on how to do it:</p>

                                <h3>Step 1: Download the CSV Template</h3>
                                <ul>
                                    <li>Navigate to the product management section of our platform.</li>
                                    <li>Find and click on the 'Download CSV Template' button. This will download a CSV file
                                        which is pre-formatted with the necessary columns for product data.</li>
                                </ul>

                                <h3>Step 2: Fill Out the CSV File</h3>
                                <ul>
                                    <li>Open the downloaded CSV file in a spreadsheet program (like Microsoft Excel or
                                        Google Sheets).</li>
                                    <li>Fill in the product details in the respective columns. Common columns include
                                        Product Name, Description, Price, Quantity, and Category Path.</li>
                                    <li>For categories, use a hierarchical structure if applicable (e.g., "Electronics >
                                        Computers > Laptops").</li>
                                    <li>Ensure all the required fields are filled out to avoid errors during the upload
                                        process.</li>
                                </ul>

                                <h3>Step 3: Save Your Changes</h3>
                                <ul>
                                    <li>After entering all the product details, save the file in CSV format.</li>
                                </ul>

                                <h3>Step 4: Upload the CSV File</h3>
                                <ul>
                                    <li>Return to the product management section on our platform.</li>
                                    <li>Click on the 'Upload CSV' button and select your saved CSV file.</li>
                                    <li>Confirm the upload and wait for the process to complete. Large files may take a few
                                        minutes.</li>
                                </ul>

                                <h3>Step 5: Review and Publish</h3>
                                <ul>
                                    <li>Once uploaded, review the product details for accuracy.</li>
                                    <li>If everything looks good, proceed to publish the products on your store.</li>
                                </ul>

                                <p><strong>Notes:</strong></p>
                                <ul>
                                    <li>Please adhere to the CSV format to prevent errors during the upload.</li>
                                    <li>In case of any errors, the system will provide specific error messages to help you
                                        rectify them.</li>
                                    <li>For large inventories, consider breaking down the upload into smaller batches to
                                        ensure smoother processing.</li>
                                </ul>

                                <p>This CSV upload method is designed to make bulk product management simple and efficient,
                                    saving you time and effort.</p>
                                <a download="csv-template.csv" href="/upload/csv/csv-template.csv" class="btn btn-primary btn-sm">Download CSV</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Basic info-->




            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_profile_details2" aria-expanded="true"
                    aria-controls="kt_account_profile_details2">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Upload CSV</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_profile_details2" class="collapse">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p>Upload your csv file for uploading all products, brands and categories.</p>
                                @livewire('admin.product.upload-c-s-v')
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Content-->
            </div>

        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
@endsection
