@extends('front.layouts.app')
@section('content')

	<section class="top-space listing-dashboard">
		<div class="border-bottom">
		    <div class="container">
		      <div class="row">
		        <div class="col-12 text-center pb-3 pt-4">
		          <img
		            src="{{ url('/img/user/profile-image/16065661751.jpg') }}"
		            class="img-fluid dashboard-profile"
		          />

		          <h2 class="n-bold f-24 text-muted mb-0 pt-md-4 pt-4 text-uppercase">
		            HI Satish
		          </h2>
		          <p class="r-lightItalic f-9 text-body">
		            Here is the dashboard for your previous / upcoming events and your
		            <br class="d-md-block d-none" />progress with TH2.0
		          </p>
		        </div>
		      </div>
		    </div>
		</div>
		<div class="border-bottom update-profile pb-4 pt-3">
		    <div class="container">
		      <h2
		        class="n-bold f-24 text-muted mb-0 py-md-4 pt-4 text-center text-uppercase"
		      >
		        Verification Details
		      </h2>
		      <!-- <div class="form-group">
								
									<label for="profile-image">Profile Image:</label>
									<input type="file" name="profile-image" id="profile-image">
								
							</div>
							<div class="form-group">
								
									<label for="government-id">Government ID:</label>
									<input type="file" name="government-id" id="government-id">
								
							</div> -->
		      <div class="row">
		        <div class="col-lg-6">
		          <div class="form-group">
		            <form
		              method="POST"
		              action="http://127.0.0.1:8000/dashboard"
		              accept-charset="UTF-8"
		              id="selfiePhoto"
		              class="w-100"
		              enctype="multipart/form-data"
		            >
		              <input
		                name="_token"
		                type="hidden"
		                value="IE1bmoRsiBXn8ZvwRGMXkZHFMxCkqwkD2CO0Kp1p"
		              />
		              <label
		                for="selfie-image"
		                class="text-left mb-0 align-self-center r-italic f-9 text-body"
		                >Your Photograph (Recognisable Image/ Passport
		                Photograph):</label
		              >

		              <div class="uploaded-img">
		                <ul class="d-flex flex-wrap pl-0">
		                  <li class="border position-relative">
		                    <div
		                      class="overlay position-absolute d-flex justify-content-center"
		                    >
		                      <i
		                        class="far fa-times-circle float-right text-danger delete-photo"
		                        title="Your document not yet verified. You can update the document."
		                        style="cursor: pointer"
		                      ></i>
		                    </div>
		                    <img
		                      src="{{ url('/img/user/selfie/16087179331.jpg') }}"
		                      alt=""
		                      class="h-100 w-auto"
		                      style="max-width: 84px"
		                    />
		                  </li>
		                </ul>
		              </div>
		            </form>
		          </div>
		        </div>
		        <div class="col-lg-6">
		          <div class="form-group">
		            <form
		              method="POST"
		              action="http://127.0.0.1:8000/dashboard"
		              accept-charset="UTF-8"
		              id="governmentFormId"
		              class="w-100"
		              enctype="multipart/form-data"
		            >
		              <input
		                name="_token"
		                type="hidden"
		                value="IE1bmoRsiBXn8ZvwRGMXkZHFMxCkqwkD2CO0Kp1p"
		              />
		              <label
		                for="government-id"
		                class="text-left mb-0 align-self-center r-italic f-9 text-body"
		                >Two ID Proofs (Adhar, Passport, Driving Licence,
		                Pancard):</label
		              >
		              <div class="uploaded-img">
		                <ul
		                  class="flex-wrap pl-0 d-inline-block"
		                  style="display: inline-block;"
		                >
		                  <li class="border position-relative">
		                    <div
		                      class="overlay position-absolute d-flex justify-content-center"
		                    >
		                      <i
		                        class="far fa-times-circle float-right text-danger delete-gov-id"
		                        data-gov-doc="0"
		                        style="cursor: pointer"
		                        title="Your document not yet verified, You can update the document."
		                      ></i>
		                    </div>
		                    <img
		                      src="{{ url('/img/user/government-id/16087178601.jpg') }}"
		                      alt=""
		                      class="h-100 w-auto"
		                      style="max-width: 84px"
		                    />
		                  </li>
		                </ul>

		                <ul
		                  class="flex-wrap pl-0 d-inline-block"
		                  style="display: inline-block;"
		                >
		                  <input
		                    type="file"
		                    multiple=""
		                    class="custom-file-input w-100 d-none government-ids"
		                    name="government-id2"
		                  />
		                  <li class="border drag-container gov-id">
		                    <div
		                      class="progress d-none gov-id-progress"
		                      style="height: 0.6rem; font-size: 0.5rem; margin-top:38px;"
		                    >
		                      <div
		                        class="progress-bar progress-bar-striped progress-bar-animated"
		                        role="progressbar"
		                        aria-valuenow="0"
		                        aria-valuemin="0"
		                        aria-valuemax="100"
		                        style="width: 0%"
		                      ></div>
		                    </div>
		                    <img
		                      src="{{url('/img/plus-sign.svg') }}"
		                      class="img-fluid w-100"
		                      alt=""
		                    />
		                  </li>
		                </ul>
		              </div>
		            </form>
		          </div>
		        </div>
		      </div>

		      <div class="row">
		        <div class="col-lg-6">
		          <label
		            for="email"
		            class="text-left mb-0 align-self-center r-italic f-9 text-body"
		            >Email:</label
		          >
		          <div class="input-group mb-3 position-relative">
		            <input
		              class="form-control rounded-9 commonClass mb-0"
		              aria-label="Input group example"
		              id="email"
		              name="email"
		              type="email"
		              value="satishglondhe@gmail.com"
		            />
		            <div id="email_verify_div">
		              <div class="input-group-append btn-success">
		                <!-- <i toggle="#password-field" class=" input-group-text btn-success f-8 n-bold">verified</i> -->
		                <!-- <img src="http://127.0.0.1:8000/img/SVG_Cowork/verified-svg.svg" class="img-fluid verify-img"> -->
		                <svg
		                  xmlns="http://www.w3.org/2000/svg"
		                  viewBox="0 0 87.28 22.41"
		                >
		                  <defs>
		                    <style>
		                      .cls-51{fill:#00a651;stroke:#010201;stroke-miterlimit:10;stroke-width:0.01px;}.cls-52{isolation:isolate;font-size:10px;fill:#fff;font-family:nevis-Bold, nevis;font-weight:700;}
		                    </style>
		                  </defs>
		                  <g id="Layer_2" data-name="Layer 2">
		                    <g id="Layer_1-2" data-name="Layer 1">
		                      <rect
		                        class="cls-51"
		                        x="0.01"
		                        y="0.01"
		                        width="87.27"
		                        height="22.4"
		                      ></rect>
		                      <text class="cls-52" transform="translate(20.48 15.42)">
		                        VERIFIED
		                      </text>
		                    </g>
		                  </g>
		                </svg>
		              </div>
		            </div>
		          </div>
		        </div>
		        <div class="col-lg-6">
		          <label
		            for="email"
		            class="text-left mb-0 align-self-center r-italic f-9 text-body"
		            >Phone:</label
		          >
		          <div class="input-group mb-3 position-relative">
		            <input
		              class="form-control"
		              aria-label="Input group example"
		              id="phone"
		              name="phone"
		              type="text"
		              value="9876543210"
		            />
		            <div id="phone_verify_div">
		              <div
		                class="input-group-append btn-warning phone_verify"
		                id="phone_verify"
		                style="cursor: pointer;"
		              >
		                <i
		                  class="phone-loader d-none input-group-text btn-warning f-8 email_verify n-bold"
		                >
		                  <div
		                    class="spinner-border text-white spinner-border-sm mx-auto"
		                    role="status"
		                  >
		                    <span class="sr-only">Loading...</span>
		                  </div>
		                </i>

		                <svg
		                  id="phone-svg"
		                  xmlns="http://www.w3.org/2000/svg"
		                  viewBox="0 0 87.28 22.41"
		                >
		                  <defs>
		                    <style>
		                      .cls-41{fill:#f90;stroke:#010201;stroke-miterlimit:10;stroke-width:0.01px;}.cls-42{isolation:isolate;font-size:11px;fill:#fff;font-family:nevis-Bold, nevis;font-weight:700;}@import  url("https://www.urbanfonts.com/fonts/nevis_Bold.font");
		                    </style>
		                  </defs>
		                  <g id="Layer_2" data-name="Layer 2">
		                    <g id="Layer_1-2" data-name="Layer 1">
		                      <rect class="cls-41" width="87.27" height="22.4"></rect>
		                      <text class="cls-42" transform="translate(24.45 15.41)">
		                        VERIFY
		                      </text>
		                    </g>
		                  </g>
		                </svg>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
		</div>

		<div class="main-listing body-color pt-md-4 pt-0 border-bottom pb-4">
		    <div class="container">
		      <h2 class="n-bold f-24 text-muted mb-0 pt-md-0 pt-5 text-center">
		        LISTING DASHBOARD
		      </h2>
		      <p class="r-lightItalic f-9 text-body text-center">
		        Get all your listing details and their growth since listed on TH2.0
		      </p>
		      <div
		        class="row pt-md-3 pt-4 card-listing-filter card-listing-filter-dashboard"
		      >
		        <div class="col-xl-4 col-lg-4 col-sm-6 mb-2 pb-md-0 pb-4 pr-sm-0">
		          <div class="card bg-white border rounded-0">
		            <div class="card-body p-0">
		              <div class="text-center img-rank position-relative">
		                <div class="dropdown position-absolute">
		                  <div
		                    class="bg-color rounded-6 shadow-sm"
		                    data-toggle="dropdown"
		                  >
		                    <i class="fas fa-ellipsis-h text-success"></i>
		                  </div>
		                  <div
		                    class="dropdown-menu py-0 dropdown-menu-right"
		                    style="z-index: 999;min-width: 10rem;"
		                  >
		                    <a
		                      href="http://127.0.0.1:8000/dashboard"
		                      class="dropdown-item r-boldItalic f-9 text-dark py-2"
		                      >Verify Account</a
		                    >
		                    <button
		                      type="button"
		                      class="dropdown-item r-boldItalic f-9 text-dark py-2 deleteBtn"
		                      data-value="1"
		                    >
		                      Delete
		                    </button>
		                  </div>
		                </div>
		                <img
		                  src="{{ url('/img/cowork/banner/banner_1602569193.jpeg') }}"
		                  class="img-fluid card-image-top"
		                  alt=""
		                />
		                <div class="position-absolute eye-wrapper">
		                  <a
		                    href="http://127.0.0.1:8000/explore/we-works-123-1"
		                    target="_blank"
		                    ><i class="fas fa-eye text-info"></i
		                  ></a>
		                </div>
		              </div>
		              <div
		                class="d-flex justify-content-between flex-md-row flex-sm-column flex-row pt-2"
		              >
		                <div class="card-prices pr-3">
		                  <h5 class="f-16 text-dark n-bold mb-0 text-uppercase">
		                    We Works 123
		                  </h5>
		                  <div class="description">
		                    <p class="text-light r-lightItalic f-8 p-0">
		                      Deccan Bus stop, Pulachi Wadi
		                    </p>
		                  </div>
		                  <h6 class="r-boldItalic f-8 text-light mb-0">
		                    Current Subscription :
		                    <span class="r-lightItalic"> $15/month </span>
		                  </h6>
		                </div>
		                <div
		                  class="card-text-right-box d-flex align-items-start pt-3 pt-lg-0"
		                >
		                  <div
		                    class="category-type img-comntainer pt-xl-4 text-center pt-lg-4"
		                  >
		                    <div
		                      class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver"
		                    >
		                      <p
		                        class="text-black n-bold f-24 text-center align-self-center mb-0"
		                      >
		                        4.0
		                      </p>
		                    </div>
		                  </div>
		                </div>
		              </div>
		              <div
		                class="d-md-flex d-sm-block d-flex mt-xl-3 mt-lg-2 mt-md-0 pt-xl-0 pt-5 pt-sm-2"
		              >
		                <a
		                  class="btn btn-info n-bold f-6 text-muted rounded-0 w-100"
		                  href="http://127.0.0.1:8000/co-work-space/edit/we-works-123-1"
		                  >EDIT LISTING</a
		                >

		                <a
		                  href="http://127.0.0.1:8000/co-work-space/upgrade-package/we-works-123-1"
		                  class="btn btn-success n-bold f-6 rounded-0 ml-md-2 ml-sm-0 ml-2 mt-md-0 mt-sm-2 mt-0 w-100"
		                  >UPGRADE PACKAGE</a
		                >
		              </div>
		            </div>
		          </div>
		        </div>
		        <div class="col-xl-4 col-lg-4 col-sm-6 mb-2 pb-md-0 pb-4 pr-sm-0">
		          <div class="card bg-white border rounded-0">
		            <div class="card-body p-0">
		              <div class="text-center img-rank position-relative">
		                <div class="dropdown position-absolute">
		                  <div
		                    class="bg-color rounded-6 shadow-sm"
		                    data-toggle="dropdown"
		                  >
		                    <i class="fas fa-ellipsis-h text-success"></i>
		                  </div>
		                  <div
		                    class="dropdown-menu py-0 dropdown-menu-right"
		                    style="z-index: 999;min-width: 10rem;"
		                  >
		                    <a
		                      href="http://127.0.0.1:8000/dashboard"
		                      class="dropdown-item r-boldItalic f-9 text-dark py-2"
		                      >Verify Account</a
		                    >
		                    <button
		                      class="dropdown-item r-boldItalic f-9 text-dark py-2"
		                    >
		                      Pending Approval
		                    </button>
		                    <button
		                      type="button"
		                      class="dropdown-item r-boldItalic f-9 text-dark py-2 deleteBtn"
		                      data-value="10"
		                    >
		                      Delete
		                    </button>
		                  </div>
		                </div>
		                <img
		                  src="{{ url('/img/cowork/banner/banner_1613544285.jpeg') }}"
		                  class="img-fluid card-image-top"
		                  alt=""
		                />
		                <div class="position-absolute eye-wrapper">
		                  <a
		                    href="http://127.0.0.1:8000/explore/satish-test-10"
		                    target="_blank"
		                    ><i class="fas fa-eye text-info"></i
		                  ></a>
		                </div>
		              </div>
		              <div
		                class="d-flex justify-content-between flex-md-row flex-sm-column flex-row pt-2"
		              >
		                <div class="card-prices pr-3">
		                  <h5 class="f-16 text-dark n-bold mb-0 text-uppercase">
		                    Satish Test
		                  </h5>
		                  <div class="description">
		                    <p class="text-light r-lightItalic f-8 p-0">
		                      600, Shivajinagar, Pune, Mahar
		                    </p>
		                  </div>
		                  <h6 class="r-boldItalic f-8 text-light mb-0">
		                    Current Subscription : <span class="r-lightItalic"> </span>
		                  </h6>
		                </div>
		                <div
		                  class="card-text-right-box d-flex align-items-start pt-3 pt-lg-0"
		                >
		                  <div
		                    class="category-type img-comntainer pt-xl-4 text-center pt-lg-4"
		                  >
		                    <div
		                      class="ratings list-view-rating align-self-center d-flex justify-content-center bg-brown border-brown"
		                    >
		                      <p
		                        class="text-black n-bold f-24 text-center align-self-center mb-0"
		                      >
		                        0.0
		                      </p>
		                    </div>
		                  </div>
		                </div>
		              </div>
		              <div
		                class="d-md-flex d-sm-block d-flex mt-xl-3 mt-lg-2 mt-md-0 pt-xl-0 pt-5 pt-sm-2"
		              >
		                <a
		                  class="btn btn-info n-bold f-6 text-muted rounded-0 w-100"
		                  href="http://127.0.0.1:8000/co-work-space/edit/satish-test-10"
		                  >EDIT LISTING</a
		                >

		                <a
		                  href="http://127.0.0.1:8000/co-work-space/upgrade-package/satish-test-10"
		                  class="btn btn-success n-bold f-6 rounded-0 ml-md-2 ml-sm-0 ml-2 mt-md-0 mt-sm-2 mt-0 w-100"
		                  >UPGRADE PACKAGE</a
		                >
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
		</div>

		<div class="booking-listing py-4 border-bottom">
		    <div class="container">
		      <h2 class="n-bold f-24 text-muted mb-0 pt-md-0 pt-5 text-center">
		        MY BOOKINGS
		      </h2>
		      <p class="r-lightItalic f-9 text-body text-center">
		        Get a timeline list of all the venues and events you booked via TH2.0
		      </p>
		      <div class="row pt-md-3 pt-4 card-listing-filter">
		        <div class="col-xl-4 col-lg-4 col-sm-6 mb-2 pb-md-0 pb-4 pr-sm-0">
		          <div class="card bg-white border rounded-0 border-bottom-red">
		            <div class="card-body p-0">
		              <div class="text-center img-rank">
		                <img
		                  src="{{ url('/img/cowork/banner/banner_1608197384.jpeg') }}"
		                  class="img-fluid"
		                  alt=""
		                />
		              </div>

		              <div class="d-flex justify-content-between flex-row pt-2">
		                <div class="card-prices">
		                  <h5 class="f-16 text-dark n-bold mb-0 text-uppercase">
		                    Ripp Studio Private Limited
		                  </h5>
		                  <div class="description">
		                    <p class="text-light r-lightItalic f-9 p-0">
		                      Bhimpore Gram panchayat Office
		                    </p>
		                  </div>
		                </div>
		                <div class="card-text-right-box pt-3 pt-lg-0 align-self-center">
		                  <a
		                    href="http://127.0.0.1:8000/explore/ripp-studio-private-limited-6"
		                    class="btn btn-info n-bold f-6 text-muted rounded-0"
		                    >EXPLORE</a
		                  >
		                </div>
		              </div>

		              <div class="d-flex justify-content-between w-100 pr-2">
		                <p class="f-8 r-lightItalic text-light mb-0">Booking Date</p>
		                <p class="f-8 r-lightItalic pl-1 mb-0">17th December 2020</p>
		              </div>
		              <div class="d-flex justify-content-between w-100 pr-2">
		                <p class="f-8 r-lightItalic text-light mb-0">
		                  Booking Created On
		                </p>
		                <p class="f-8 r-lightItalic pl-1 mb-0">16th December 2020</p>
		              </div>
		              <div class="d-flex justify-content-between w-100 pr-2"></div>

		              <div class="d-flex justify-content-between w-100 pr-2">
		                <p class="f-8 r-lightItalic text-light mb-0">Payment Status</p>
		                <p class="f-8 r-lightItalic pl-1 mb-0">Pending</p>
		              </div>
		            </div>
		          </div>
		        </div>
		        <div class="col-xl-4 col-lg-4 col-sm-6 mb-2 pb-md-0 pb-4 pr-sm-0">
		          <div class="card bg-white border rounded-0 border-bottom-red">
		            <div class="card-body p-0">
		              <div class="text-center img-rank">
		                <img
		                  src="{{ url('/img/cowork/banner/banner_1608197384.jpeg') }}"
		                  class="img-fluid"
		                  alt=""
		                />
		              </div>

		              <div class="d-flex justify-content-between flex-row pt-2">
		                <div class="card-prices">
		                  <h5 class="f-16 text-dark n-bold mb-0 text-uppercase">
		                    Ripp Studio Private Limited
		                  </h5>
		                  <div class="description">
		                    <p class="text-light r-lightItalic f-9 p-0">
		                      Bhimpore Gram panchayat Office
		                    </p>
		                  </div>
		                </div>
		                <div class="card-text-right-box pt-3 pt-lg-0 align-self-center">
		                  <a
		                    href="http://127.0.0.1:8000/explore/ripp-studio-private-limited-6"
		                    class="btn btn-info n-bold f-6 text-muted rounded-0"
		                    >EXPLORE</a
		                  >
		                </div>
		              </div>

		              <div class="d-flex justify-content-between w-100 pr-2">
		                <p class="f-8 r-lightItalic text-light mb-0">Booking Date</p>
		                <p class="f-8 r-lightItalic pl-1 mb-0">18th December 2020</p>
		              </div>
		              <div class="d-flex justify-content-between w-100 pr-2">
		                <p class="f-8 r-lightItalic text-light mb-0">
		                  Booking Created On
		                </p>
		                <p class="f-8 r-lightItalic pl-1 mb-0">17th December 2020</p>
		              </div>
		              <div class="d-flex justify-content-between w-100 pr-2"></div>

		              <div class="d-flex justify-content-between w-100 pr-2">
		                <p class="f-8 r-lightItalic text-light mb-0">Payment Status</p>
		                <p class="f-8 r-lightItalic pl-1 mb-0">failure</p>
		              </div>
		            </div>
		          </div>
		        </div>
		        <div class="col-xl-4 col-lg-4 col-sm-6 mb-2 pb-md-0 pb-4 pr-sm-0">
		          <div class="card bg-white border rounded-0 border-bottom-red">
		            <div class="card-body p-0">
		              <div class="text-center img-rank">
		                <img
		                  src="{{ url('/img/cowork/banner/banner_1608197384.jpeg') }}"
		                  class="img-fluid"
		                  alt=""
		                />
		              </div>

		              <div class="d-flex justify-content-between flex-row pt-2">
		                <div class="card-prices">
		                  <h5 class="f-16 text-dark n-bold mb-0 text-uppercase">
		                    Ripp Studio Private Limited
		                  </h5>
		                  <div class="description">
		                    <p class="text-light r-lightItalic f-9 p-0">
		                      Bhimpore Gram panchayat Office
		                    </p>
		                  </div>
		                </div>
		                <div class="card-text-right-box pt-3 pt-lg-0 align-self-center">
		                  <a
		                    href="http://127.0.0.1:8000/explore/ripp-studio-private-limited-6"
		                    class="btn btn-info n-bold f-6 text-muted rounded-0"
		                    >EXPLORE</a
		                  >
		                </div>
		              </div>

		              <div class="d-flex justify-content-between w-100 pr-2">
		                <p class="f-8 r-lightItalic text-light mb-0">Booking Date</p>
		                <p class="f-8 r-lightItalic pl-1 mb-0">29th December 2020</p>
		              </div>
		              <div class="d-flex justify-content-between w-100 pr-2">
		                <p class="f-8 r-lightItalic text-light mb-0">
		                  Booking Created On
		                </p>
		                <p class="f-8 r-lightItalic pl-1 mb-0">28th December 2020</p>
		              </div>
		              <div class="d-flex justify-content-between w-100 pr-2"></div>

		              <div class="d-flex justify-content-between w-100 pr-2">
		                <p class="f-8 r-lightItalic text-light mb-0">Payment Status</p>
		                <p class="f-8 r-lightItalic pl-1 mb-0">Pending</p>
		              </div>
		            </div>
		          </div>
		        </div>
		        <div class="col-xl-4 col-lg-4 col-sm-6 mb-2 pb-md-0 pb-4 pr-sm-0">
		          <div class="card bg-white border rounded-0 border-bottom-red">
		            <div class="card-body p-0">
		              <div class="text-center img-rank">
		                <img
		                  src="{{ url('/img/cowork/banner/banner_1608197384.jpeg') }}"
		                  class="img-fluid"
		                  alt=""
		                />
		              </div>

		              <div class="d-flex justify-content-between flex-row pt-2">
		                <div class="card-prices">
		                  <h5 class="f-16 text-dark n-bold mb-0 text-uppercase">
		                    Ripp Studio Private Limited
		                  </h5>
		                  <div class="description">
		                    <p class="text-light r-lightItalic f-9 p-0">
		                      Bhimpore Gram panchayat Office
		                    </p>
		                  </div>
		                </div>
		                <div class="card-text-right-box pt-3 pt-lg-0 align-self-center">
		                  <a
		                    href="http://127.0.0.1:8000/explore/ripp-studio-private-limited-6"
		                    class="btn btn-info n-bold f-6 text-muted rounded-0"
		                    >EXPLORE</a
		                  >
		                </div>
		              </div>

		              <div class="d-flex justify-content-between w-100 pr-2">
		                <p class="f-8 r-lightItalic text-light mb-0">Booking Date</p>
		                <p class="f-8 r-lightItalic pl-1 mb-0">6th January 2021</p>
		              </div>
		              <div class="d-flex justify-content-between w-100 pr-2">
		                <p class="f-8 r-lightItalic text-light mb-0">
		                  Booking Created On
		                </p>
		                <p class="f-8 r-lightItalic pl-1 mb-0">5th January 2021</p>
		              </div>
		              <div class="d-flex justify-content-between w-100 pr-2"></div>

		              <div class="d-flex justify-content-between w-100 pr-2">
		                <p class="f-8 r-lightItalic text-light mb-0">Payment Status</p>
		                <p class="f-8 r-lightItalic pl-1 mb-0">Pending</p>
		              </div>
		            </div>
		          </div>
		        </div>
		        
		      </div>
		    </div>
		</div>
	</section>

@endsection