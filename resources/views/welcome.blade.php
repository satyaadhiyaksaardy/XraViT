<!DOCTYPE html>
<html lang="en" data-footer="true" data-scrollspy="true">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>XraViT | Check Your Chest X-Ray</title>
    <!-- Favicon Tags Start -->
    <link rel="icon" type="image/png" href="{{ asset('img/logo/xravit-icon.svg') }}" />
    <meta name="description" content="Diagnose your chest x-ray" />
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <!-- Favicon Tags End -->
    <!-- Font Tags Start -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('font/CS-Interface/style.css') }}" />
    <!-- Font Tags End -->
    <!-- Vendor Styles Start -->
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/OverlayScrollbars.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <!-- Vendor Styles End -->
    <!-- Template Base Styles Start -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <!-- Template Base Styles End -->

    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <script src="{{ asset('js/base/loader.js') }}"></script>
</head>

<body>
    <div id="root">
        <div id="nav" class="nav-container d-flex">
            <div class="nav-content d-flex">
                <!-- Logo Start -->
                <div class="logo position-relative">
                    <a href="{{ url('/') }}">
                        <!-- Logo can be added directly -->
                        <!-- <img src="img/logo/logo-white.svg" alt="logo" /> -->

                        <!-- Or added via css to provide different ones for different color themes -->
                        <div class="img"></div>
                    </a>
                </div>
                <!-- Logo End -->

                <!-- Language Switch Start -->
                <div class="language-switch-container">
                </div>
                <!-- Language Switch End -->

                <!-- User Menu Start -->
                <div class="user-container d-flex">
                    <a href="#" class="d-flex user position-relative">
                        <img class="profile" alt="profile" src="{{ asset('img/logo/xravit-icon.svg') }}" />
                        <div class="name">Chest X-Ray</div>
                    </a>
                </div>
                <!-- User Menu End -->

                <!-- Icons Menu Start -->
                <ul class="list-unstyled list-inline text-center menu-icons">
                </ul>
                <!-- Icons Menu End -->

                <!-- Menu Start -->
                <div class="menu-container flex-grow-1">
                    <ul id="menu" class="menu">
                    </ul>
                </div>
                <!-- Menu End -->

                <!-- Mobile Buttons Start -->
                <div class="mobile-buttons-container">
                    <!-- Scrollspy Mobile Button Start -->
                    <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
                        <i data-acorn-icon="menu-dropdown"></i>
                    </a>
                    <!-- Scrollspy Mobile Button End -->

                    <!-- Scrollspy Mobile Dropdown Start -->
                    <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
                    <!-- Scrollspy Mobile Dropdown End -->

                    <!-- Menu Button Start -->
                    <a href="#" id="mobileMenuButton" class="menu-button">
                        <i data-acorn-icon="menu"></i>
                    </a>
                    <!-- Menu Button End -->
                </div>
                <!-- Mobile Buttons End -->
            </div>
            <div class="nav-shadow"></div>
        </div>

        <main>
            <div class="container">
                <div class="row">
                    <div class="col">

                        <!-- Content Start -->
                        <div>
                            <div class="card mb-5">
                                <div class="card-body">
                                    <h4 class="mb-0">
                                        Power your diagnosis with <b> Vision Transformer technology</b>. Upload your
                                        chest X-ray
                                        now!
                                    </h4>
                                </div>
                            </div>

                            <section class="scroll-section" id="customFileInput">
                                <h2 class="small-title">Upload Your Chest X-Ray Image</h2>
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ url('/upload') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="input"
                                                    name="input" />
                                                <label class="input-group-text" for="input">Upload</label>
                                            </div>
                                            <textarea disabled placeholder="Analized output..." class="form-control mb-3" name="output" id="output"
                                                rows="10"></textarea>
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- Content End -->
                    </div>
                </div>
            </div>
        </main>
        <!-- Layout Footer Start -->
        <footer>
            <div class="footer-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <p class="mb-0 text-muted text-medium">XraViT © {{ date('Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Layout Footer End -->
    </div>

    <!-- Theme Settings Modal Start -->
    <div class="modal fade modal-right scroll-out-negative" id="settings" data-bs-backdrop="true" tabindex="-1"
        role="dialog" aria-labelledby="settings" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable full" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Theme Settings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="scroll-track-visible">
                        <div class="mb-5" id="color">
                            <label class="mb-3 d-inline-block form-label">Color</label>
                            <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="light-blue"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="blue-light"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">LIGHT BLUE</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-blue"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="blue-dark"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DARK BLUE</span>
                                    </div>
                                </a>
                            </div>
                            <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="light-teal"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="teal-light"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">LIGHT TEAL</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-teal"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="teal-dark"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DARK TEAL</span>
                                    </div>
                                </a>
                            </div>
                            <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="light-sky"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="sky-light"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">LIGHT SKY</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-sky"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="sky-dark"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DARK SKY</span>
                                    </div>
                                </a>
                            </div>
                            <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="light-red"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="red-light"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">LIGHT RED</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-red"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="red-dark"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DARK RED</span>
                                    </div>
                                </a>
                            </div>
                            <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="light-green"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="green-light"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">LIGHT GREEN</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-green"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="green-dark"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DARK GREEN</span>
                                    </div>
                                </a>
                            </div>
                            <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="light-lime"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="lime-light"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">LIGHT LIME</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-lime"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="lime-dark"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DARK LIME</span>
                                    </div>
                                </a>
                            </div>
                            <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="light-pink"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="pink-light"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">LIGHT PINK</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-pink"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="pink-dark"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DARK PINK</span>
                                    </div>
                                </a>
                            </div>
                            <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="light-purple"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="purple-light"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">LIGHT PURPLE</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-purple"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="purple-dark"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DARK PURPLE</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="mb-5" id="navcolor">
                            <label class="mb-3 d-inline-block form-label">Override Nav Palette</label>
                            <div class="row d-flex g-3 justify-content-between flex-wrap">
                                <a href="#" class="flex-grow-1 w-33 option col" data-value="default"
                                    data-parent="navcolor">
                                    <div class="card rounded-md p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary top"></div>
                                        <div class="figure figure-secondary bottom"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DEFAULT</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-33 option col" data-value="light"
                                    data-parent="navcolor">
                                    <div class="card rounded-md p-3 mb-1 no-shadow">
                                        <div class="figure figure-secondary figure-light top"></div>
                                        <div class="figure figure-secondary bottom"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">LIGHT</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-33 option col" data-value="dark"
                                    data-parent="navcolor">
                                    <div class="card rounded-md p-3 mb-1 no-shadow">
                                        <div class="figure figure-muted figure-dark top"></div>
                                        <div class="figure figure-secondary bottom"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DARK</span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="mb-5" id="placement">
                            <label class="mb-3 d-inline-block form-label">Menu Placement</label>
                            <div class="row d-flex g-3 justify-content-between flex-wrap">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="horizontal"
                                    data-parent="placement">
                                    <div class="card rounded-md p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary top"></div>
                                        <div class="figure figure-secondary bottom"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">HORIZONTAL</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="vertical"
                                    data-parent="placement">
                                    <div class="card rounded-md p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary left"></div>
                                        <div class="figure figure-secondary right"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">VERTICAL</span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="mb-5" id="behaviour">
                            <label class="mb-3 d-inline-block form-label">Menu Behaviour</label>
                            <div class="row d-flex g-3 justify-content-between flex-wrap">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="pinned"
                                    data-parent="behaviour">
                                    <div class="card rounded-md p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary left large"></div>
                                        <div class="figure figure-secondary right small"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">PINNED</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="unpinned"
                                    data-parent="behaviour">
                                    <div class="card rounded-md p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary left"></div>
                                        <div class="figure figure-secondary right"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">UNPINNED</span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="mb-5" id="layout">
                            <label class="mb-3 d-inline-block form-label">Layout</label>
                            <div class="row d-flex g-3 justify-content-between flex-wrap">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="fluid"
                                    data-parent="layout">
                                    <div class="card rounded-md p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary top"></div>
                                        <div class="figure figure-secondary bottom"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">FLUID</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="boxed"
                                    data-parent="layout">
                                    <div class="card rounded-md p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary top"></div>
                                        <div class="figure figure-secondary bottom small"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">BOXED</span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="mb-5" id="radius">
                            <label class="mb-3 d-inline-block form-label">Radius</label>
                            <div class="row d-flex g-3 justify-content-between flex-wrap">
                                <a href="#" class="flex-grow-1 w-33 option col" data-value="rounded"
                                    data-parent="radius">
                                    <div class="card rounded-md radius-rounded p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary top"></div>
                                        <div class="figure figure-secondary bottom"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">ROUNDED</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-33 option col" data-value="standard"
                                    data-parent="radius">
                                    <div class="card rounded-md radius-regular p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary top"></div>
                                        <div class="figure figure-secondary bottom"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">STANDARD</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-33 option col" data-value="flat"
                                    data-parent="radius">
                                    <div class="card rounded-md radius-flat p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary top"></div>
                                        <div class="figure figure-secondary bottom"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">FLAT</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Theme Settings Modal End -->

    <!-- Niches Modal Start -->
    <div class="modal fade modal-right scroll-out-negative" id="niches" data-bs-backdrop="true" tabindex="-1"
        role="dialog" aria-labelledby="niches" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable full" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Niches</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="scroll-track-visible">
                        <div class="mb-5">
                            <label class="mb-2 d-inline-block form-label">Classic Dashboard</label>
                            <div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
                                <div class="position-relative mb-3 mb-lg-5 rounded-sm">
                                    <img src="https://acorn.coloredstrategies.com/img/page/classic-dashboard.webp"
                                        class="img-fluid rounded-sm lower-opacity border border-separator-light"
                                        alt="card image" />
                                    <div
                                        class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                                        <a target="_blank"
                                            href="https://acorn-html-classic-dashboard.coloredstrategies.com/"
                                            class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            Html
                                        </a>
                                        <a target="_blank"
                                            href="https://acorn-laravel-classic-dashboard.coloredstrategies.com/"
                                            class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            Laravel
                                        </a>
                                        <a target="_blank"
                                            href="https://acorn-dotnet-classic-dashboard.coloredstrategies.com/"
                                            class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            .Net5
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label class="mb-2 d-inline-block form-label">Medical Assistant</label>
                            <div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
                                <div class="position-relative mb-3 mb-lg-5 rounded-sm">
                                    <img src="https://acorn.coloredstrategies.com/img/page/medical-assistant.webp"
                                        class="img-fluid rounded-sm lower-opacity border border-separator-light"
                                        alt="card image" />
                                    <div
                                        class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                                        <a target="_blank"
                                            href="https://acorn-html-medical-assistant.coloredstrategies.com/"
                                            class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            Html
                                        </a>
                                        <a target="_blank"
                                            href="https://acorn-laravel-medical-assistant.coloredstrategies.com/"
                                            class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            Laravel
                                        </a>
                                        <a target="_blank"
                                            href="https://acorn-dotnet-medical-assistant.coloredstrategies.com/"
                                            class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            .Net5
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label class="mb-2 d-inline-block form-label">Service Provider</label>
                            <div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
                                <div class="position-relative mb-3 mb-lg-5 rounded-sm">
                                    <img src="https://acorn.coloredstrategies.com/img/page/service-provider.webp"
                                        class="img-fluid rounded-sm lower-opacity border border-separator-light"
                                        alt="card image" />
                                    <div
                                        class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                                        <a target="_blank"
                                            href="https://acorn-html-service-provider.coloredstrategies.com/"
                                            class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            Html
                                        </a>
                                        <a target="_blank"
                                            href="https://acorn-laravel-service-provider.coloredstrategies.com/"
                                            class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            Laravel
                                        </a>
                                        <a target="_blank"
                                            href="https://acorn-dotnet-service-provider.coloredstrategies.com/"
                                            class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            .Net5
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label class="mb-2 d-inline-block form-label">Elearning Portal</label>
                            <div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
                                <div class="position-relative mb-3 mb-lg-5 rounded-sm">
                                    <img src="https://acorn.coloredstrategies.com/img/page/elearning-portal.webp"
                                        class="img-fluid rounded-sm lower-opacity border border-separator-light"
                                        alt="card image" />
                                    <div
                                        class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                                        <a target="_blank"
                                            href="https://acorn-html-elearning-portal.coloredstrategies.com/"
                                            class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            Html
                                        </a>
                                        <a target="_blank"
                                            href="https://acorn-laravel-elearning-portal.coloredstrategies.com/"
                                            class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            Laravel
                                        </a>
                                        <a target="_blank"
                                            href="https://acorn-dotnet-elearning-portal.coloredstrategies.com/"
                                            class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            .Net5
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label class="mb-2 d-inline-block form-label">Ecommerce Platform</label>
                            <div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
                                <div class="position-relative mb-3 mb-lg-5 rounded-sm">
                                    <img src="https://acorn.coloredstrategies.com/img/page/ecommerce-platform.webp"
                                        class="img-fluid rounded-sm lower-opacity border border-separator-light"
                                        alt="card image" />
                                    <div
                                        class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                                        <a target="_blank"
                                            href="https://acorn-html-ecommerce-platform.coloredstrategies.com/"
                                            class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            Html
                                        </a>
                                        <a target="_blank"
                                            href="https://acorn-laravel-ecommerce-platform.coloredstrategies.com/"
                                            class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            Laravel
                                        </a>
                                        <a target="_blank"
                                            href="https://acorn-dotnet-ecommerce-platform.coloredstrategies.com/"
                                            class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            .Net5
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label class="mb-2 d-inline-block form-label">Starter Project</label>
                            <div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
                                <div class="position-relative mb-3 mb-lg-5 rounded-sm">
                                    <img src="https://acorn.coloredstrategies.com/img/page/starter-project.webp"
                                        class="img-fluid rounded-sm lower-opacity border border-separator-light"
                                        alt="card image" />
                                    <div
                                        class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                                        <a target="_blank"
                                            href="https://acorn-html-starter-project.coloredstrategies.com/"
                                            class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            Html
                                        </a>
                                        <a target="_blank"
                                            href="https://acorn-laravel-starter-project.coloredstrategies.com/"
                                            class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            Laravel
                                        </a>
                                        <a target="_blank"
                                            href="https://acorn-dotnet-starter-project.coloredstrategies.com/"
                                            class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            .Net5
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Niches Modal End -->

    <!-- Theme Settings & Niches Buttons Start -->
    <div class="settings-buttons-container">
        <button type="button" class="btn settings-button btn-primary p-0" data-bs-toggle="modal"
            data-bs-target="#settings" id="settingsButton">
            <span class="d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip"
                data-bs-placement="left" title="Settings">
                <i data-acorn-icon="paint-roller" class="position-relative"></i>
            </span>
        </button>
        <button type="button" class="btn settings-button btn-primary p-0" data-bs-toggle="modal"
            data-bs-target="#niches" id="nichesButton">
            <span class="d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip"
                data-bs-placement="left" title="Niches">
                <i data-acorn-icon="toy" class="position-relative"></i>
            </span>
        </button>
    </div>
    <!-- Theme Settings & Niches Buttons End -->

    <!-- Search Modal Start -->
    <div class="modal fade modal-under-nav modal-search modal-close-out" id="searchPagesModal" tabindex="-1"
        role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0 p-0">
                    <button type="button" class="btn-close btn btn-icon btn-icon-only btn-foreground"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ps-5 pe-5 pb-0 border-0">
                    <input id="searchPagesInput"
                        class="form-control form-control-xl borderless ps-0 pe-0 mb-1 auto-complete" type="text"
                        autocomplete="off" />
                </div>
                <div class="modal-footer border-top justify-content-start ps-5 pe-5 pb-3 pt-3 border-0">
                    <span class="text-alternate d-inline-block m-0 me-3">
                        <i data-acorn-icon="arrow-bottom" data-acorn-size="15"
                            class="text-alternate align-middle me-1"></i>
                        <span class="align-middle text-medium">Navigate</span>
                    </span>
                    <span class="text-alternate d-inline-block m-0 me-3">
                        <i data-acorn-icon="arrow-bottom-left" data-acorn-size="15"
                            class="text-alternate align-middle me-1"></i>
                        <span class="align-middle text-medium">Select</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Modal End -->

    <!-- Vendor Scripts Start -->
    <script src="{{ asset('js/vendor/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/OverlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('js/vendor/autoComplete.min.js') }}"></script>
    <script src="{{ asset('js/vendor/clamp.min.js') }}"></script>

    <script src="{{ asset('icon/acorn-icons.js') }}"></script>
    <script src="{{ asset('icon/acorn-icons-interface.js') }}"></script>

    <script src="{{ asset('js/cs/scrollspy.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Vendor Scripts End -->

    <!-- Template Base Scripts Start -->
    <script src="{{ asset('js/base/helpers.js') }}"></script>
    <script src="{{ asset('js/base/globals.js') }}"></script>
    <script src="{{ asset('js/base/nav.js') }}"></script>
    <script src="{{ asset('js/base/search.js') }}"></script>
    <script src="{{ asset('js/base/settings.js') }}"></script>
    <!-- Template Base Scripts End -->
    <!-- Page Specific Scripts Start -->

    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <!-- Page Specific Scripts End -->
</body>

</html>
