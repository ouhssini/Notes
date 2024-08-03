@extends('components.layout')
@section('title')
    Home Page
@endsection

@section('main')
    <header class="py-5">
        <div class="container px-5 pb-5">
            <div class="row gx-5 align-items-center">
                <div class="col-xxl-5">
                    <!-- Header text content-->
                    <div class="text-center text-xxl-start">
                        <div class="fs-3 fw-light text-muted">I can help your business to</div>
                        <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">Organize Your Thoughts<br> Simplify Your Life</span></h1>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                            <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" href="{{route('note.index')}}">Strat now</a>
                            <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder"
                                href="https://github.com/ouhssini" target="_blank">View More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-7">
                    <!-- Header profile picture-->
                    <div class="d-flex justify-content-center mt-5 mt-xxl-0">
                        <div class="profile bg-gradient-primary-to-secondary">
                            <!-- TIP: For best results, use a photo with a transparent background like the demo example below-->
                            <!-- Watch a tutorial on how to do this on YouTube (link)-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- About Section-->
    <section class="bg-light py-5">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-xxl-8">
                    <div class="text-center my-5">
                        <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">About Me</span></h2>
                        <p class="lead fw-light mb-4">Welcome to our Note Management System, an intuitive platform designed
                            to help you organize, manage, and retrieve your notes efficiently. Whether you're a student,
                            professional, or anyone who needs to keep track of important information, our system offers a
                            range of features to enhance your productivity.</p>
                        <div class="d-flex justify-content-center fs-2 gap-4">
                            <a class="text-gradient" href="#!"><i class="bi bi-twitter"></i></a>
                            <a class="text-gradient" href="#!"><i class="bi bi-linkedin"></i></a>
                            <a class="text-gradient" href="#!"><i class="bi bi-github"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
