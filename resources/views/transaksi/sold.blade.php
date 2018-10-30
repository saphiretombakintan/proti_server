<!DOCTYPE html>

<html lang="en">

<!-- begin::Head -->
<head>
	<meta charset="utf-8" />
	<title>Smile In Properti</title>
	<meta name="description" content="Scrollable datatables examples">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

	<!--begin::Web font -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!--end::Web font -->

	<!--begin::Page Vendors Styles -->
	<link href="{{ URL::asset('assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

	<!--RTL version:<link href="../../../assets/vendors/custom/datatables/datatables.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

	<!--end::Page Vendors Styles -->

	<!--begin::Base Styles -->
	<link href="{{ URL::asset('assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />

	<!--RTL version:<link href="../../../assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
	<link href="{{ URL::asset('assets/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />

	<!--RTL version:<link href="../../../assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

	<!--end::Base Styles -->
	<link rel="shortcut icon" href="{{ URL::asset('assets/images/icon-biru.png') }}" />
</head>
<!-- begin::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-aside-left--minimize m-brand--minimize m-footer--push m-aside--offcanvas-default">

	<div class="m-grid m-grid--hor m-grid--root m-page">
		<!-- ini awal header -->
		@extends('layouts.header')

		<!-- ini awal body -->
		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
			@extends('layouts.menu')
			<!-- END: Left Aside -->
			<div class="m-grid__item m-grid__item--fluid m-wrapper">
				<!-- BEGIN: Subheader -->
				<div class="m-subheader ">
					<div class="d-flex align-items-center">
						<div class="mr-auto">
							<h3 class="m-subheader__title m-subheader__title--separator">DATA AKAD</h3>
							<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
								<li class="m-nav__item m-nav__item--home">
									<a href="#" class="m-nav__link m-nav__link--icon">
										<i class="m-nav__link-icon la la-home"></i>
									</a>
								</li>
								<li class="m-nav__separator">-</li>
								<li class="m-nav__item">
									<a href="" class="m-nav__link">
										<span class="m-nav__link-text">Transaksi</span>
									</a>
								</li>
								<li class="m-nav__separator">-</li>
								<li class="m-nav__item">
									<a href="" class="m-nav__link">
										<span class="m-nav__link-text">Sold</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- END: Subheader -->
				<div class="m-content">
					@if(session()->has('msg'))
					<div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-success alert-dismissible fade show" role="alert">
						<div class="m-alert__icon">
							<i class="flaticon-close"></i>
							<span></span>
						</div>
						<div class="m-alert__text">
							<strong>Sukses!</strong> Update Status .
						</div>
						<div class="m-alert__close">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							</button>
						</div>
					</div>
					@endif
					<div class="m-portlet m-portlet--mobile">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<h3 class="m-portlet__head-text">
										Booking Unit
									</h3>
								</div>
							</div>
							<div class="m-portlet__head-tools">
								<ul class="m-portlet__nav">

									<li class="m-portlet__nav-item"></li>
									<!-- <li class="m-portlet__nav-item">
										{{-- <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
											<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
												<i class="la la-ellipsis-h m--font-brand"></i>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">

														</div>
													</div>
												</div>
											</div>
										</div> --}}
										<a href="{{ url('/angsuran/detail/save') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
											<span>
												<i class="la la-floppy-o"></i>
												<span>Simpan Angsuran</span>
											</span>
										</a>
									</li> -->
								</ul>
							</div>
						</div>
						<div class="m-portlet__body">
							<!--begin: Datatable -->
							<div id="table-1"></div>
							<table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
								<thead>
									<tr>
										<th width="100">#</th>
										<th width="800">No. Booking</th>
										<th width="800">Nama Konsumen</th>
										<th width="800">Tlp. Konsumen</th>
										<th width="800">Kode Unit</th>
										<th width="800">Marketing</th>
										{{-- <th width="100">Status UTJ</th> --}}
										<th width="800">Status Unit</th>
										<th width="800">Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($transaksi as $data)
									<tr>
										<td width="5%">{{ $no++ }}</td>
										<td width="15%">{{ $data->booking_no }}</td>
										<td width="15%">{{ $data->name_customer }}</td>
										<td width="15%">{{ $data->phone_customer }}</td>
										<td width="15%">{{ $data->code_unit }}</td>
										<td width="15%">{{ $data->name }}</td>
										{{-- <td>{{ $data->status_fp }}</td> --}}
										<td width="15%">{{ $data->status }}</td>
										<td  nowrap>
											<span class="dropdown">
												<a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">
													<i class="la la-ellipsis-h"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right">
														<a href="javascript::void" class="dropdown-item" data-toggle="modal" data-target="#m_modal_{{ $data->id }}"><i class="la la-trash"></i> Update Data</a>
												</div>
											</span>
											<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
												<i class="la la-edit"></i>
											</a>
										</td>
									</tr>

									<!-- BEGIN MODAL -->
                  <div class="modal fade" id="m_modal_{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        						<div class="modal-dialog modal-lg" role="document">
        							<div class="modal-content">
        								<form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ route('akad.post') }}">
        									{{ csrf_field() }}
        									<input type="hidden" name="code_customer" >
        									<div class="modal-header">
        										<h3 class="modal-title" id="exampleModalLabel">Update Data</h3>
        										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        											<span aria-hidden="true">&times;</span>
        										</button>
        									</div>
        									<div class="modal-body">
        										<div class="form-group m-form__group">
        											<label for="exampleInputEmail1">Tanggal BAST</label>
        											<div class="input-group date">
        												<input type="text" class="form-control m-input" readonly name="tanggal"  placeholder="Pilih Tanggal" id="m_datepicker_2"/>
        												<div class="input-group-append">
        													<span class="input-group-text">
        														<i class="la la-calendar-check-o"></i>
        													</span>
        												</div>
        											</div>
        										</div>
        										<div class="form-group m-form__group">
        											<label for="exampleInputEmail1">PIC BAST</label>
        											<input type="text" class="form-control m-input" name="kprs" placeholder="Nama KPRS Bank">
        										</div>
                            <div class="form-group m-form__group">
                              <!-- <label for="exampleInputEmail1">CustumermCode</label> -->
                              <input type="hidden" class="form-control m-input" name="code_customer" value="{{ $data->code_customer }}">
                            </div>
                            <div class="form-group m-form__group">
                              <!-- <label for="exampleInputEmail1">id</label> -->
                              <input type="hidden" class="form-control m-input" name="id" value="{{ $data->id }}">
                            </div>
        									</div>
        									<div class="modal-footer">
        										<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        										<button type="submit" class="btn btn-primary">Simpan</button>
        									</div>
        								</form>
        							</div>
        						</div>
        					</div>
									<!-- END MODAL -->

									@endforeach
								</tbody>
								<
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->

				</div>

			</div>
		</div>
	</div>
	<!-- begin::Quick Nav -->

	<!--begin::Base Scripts -->
	<script src="{{ URL::asset('assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>

	<!--end::Base Scripts -->

	<!--begin::Page Vendors Scripts -->
	<script src="{{ URL::asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>

	<!--end::Page Vendors Scripts -->
  <!-- <script src="{{ URL::assets('assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js')}}" type="text/javascript"></script> -->


	<!--begin::Page Resources -->
	<script type="text/javascript">
		$(document).ready( function () {
      $("#m_datepicker_2").datepicker({
        format: 'yyyy-mm-dd'
      });
			$('#m_table_1').DataTable({
				select:{
					style: "single",
				},
				scrollX: true,
				columnDefs: [
					{
						targets:6,
						render:function(e,a,t,n){
							var s={
								1:{
									title:"BRONZE",
									class:"#cd7f32"
								},
								2:{
									title:"SILVER",
									class:"#c0c0c0"
								},
								3:{
									title:"GOLD",
									class:"#ffd700"
								}
							};
							return void 0===s[e]?e:'<span class="m-badge m-badge--wide" style="background: '+s[e].class+'; color: #fff">'+s[e].title+"</span>"
						}
					}
				],
				footerCallback: function(a, b) {
					var o = this.api(),
					l = function(a) {
						return "string" == typeof a ? 1 * a.replace(/[\Rp.,]/g, "") : "number" == typeof a ? a : 0
					},
					u = o.column(5).data().reduce(function(a, b) {
						return l(a) + l(b)
					}, 0),
					i = o.column(5, {
						page: "current"
					}).data().reduce(function(a, b) {
						return l(a) + l(b)
					}, 0);
					$(o.column(5).footer()).html("Rp. " + mUtil.numberString(i.toFixed(0)));

					var o = this.api(),
					l = function(a) {
						return "string" == typeof a ? 1 * a.replace(/[\Rp.,]/g, "") : "number" == typeof a ? a : 0
					},
					u = o.column(7).data().reduce(function(a, b) {
						return l(a) + l(b)
					}, 0),
					i = o.column(7, {
						page: "current"
					}).data().reduce(function(a, b) {
						return l(a) + l(b)
					}, 0);
					$(o.column(7).footer()).html("Rp. " + mUtil.numberString(i.toFixed(0)));

					var o = this.api(),
					l = function(a) {
						return "string" == typeof a ? 1 * a.replace(/[\Rp.,]/g, "") : "number" == typeof a ? a : 0
					},
					u = o.column(8).data().reduce(function(a, b) {
						return l(a) + l(b)
					}, 0),
					i = o.column(8, {
						page: "current"
					}).data().reduce(function(a, b) {
						return l(a) + l(b)
					}, 0);
					$(o.column(8).footer()).html("Rp. " + mUtil.numberString(i.toFixed(0)));

					var o = this.api(),
					l = function(a) {
						return "string" == typeof a ? 1 * a.replace(/[\Rp.,]/g, "") : "number" == typeof a ? a : 0
					},
					u = o.column(9).data().reduce(function(a, b) {
						return l(a) + l(b)
					}, 0),
					i = o.column(9, {
						page: "current"
					}).data().reduce(function(a, b) {
						return l(a) + l(b)
					}, 0);
					$(o.column(9).footer()).html("Rp. " + mUtil.numberString(i.toFixed(0)));
				},

			});

		});
	</script>
