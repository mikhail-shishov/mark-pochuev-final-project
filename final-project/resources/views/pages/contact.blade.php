@extends("layouts.front")
@section("title", "Contact")
@section("content")
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('{{asset("vendor/clean-blog/assets/img/contact-bg.jpg")}}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Contact Me</h1>
                        <span class="subheading">Have questions? I have answers.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>

                    @if(session('success'))
                        {{session('success')}}
                    @endif

                    <div class="my-5">
                        <form id="contactForm" action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="form-floating">
                                <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="Enter your name..." value="{{ old('name') }}" />
                                <label for="name">Name</label>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" placeholder="Enter your email..." value="{{ old('email') }}" />
                                <label for="email">Email address</label>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" type="tel" placeholder="Enter your phone number..." value="{{ old('phone') }}" />
                                <label for="phone">Phone Number</label>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" placeholder="Enter your message here..." style="height: 12rem">{{ old('message') }}</textarea>
                                <label for="message">Message</label>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <br />
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
{{--                            <div class="d-none" id="submitSuccessMessage">--}}
{{--                                <div class="text-center mb-3">--}}
{{--                                    <div class="fw-bolder">Form submission successful!</div>--}}
{{--                                    To activate this form, sign up at--}}
{{--                                    <br />--}}
{{--                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
