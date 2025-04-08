@extends('front.layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/front/pages/co-detail.min.css') }}" />
@endsection
@section('content')
    <div class="ts-sec-py-md">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="w-100">
              <img
                class="w-100 h-100 object-fit-cover rounded-1"
                loading="lazy"
                src="{{ asset('assets/images/front/company-detail/shl-graph.jpg')}}"
                alt="..."
              />
            </div>
            <div class="pt-4">
              <ul class="nav ts-nav-tabs nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link active"
                    id="Information-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#Information-tab-pane"
                    type="button"
                    role="tab"
                    aria-controls="Information-tab-pane"
                    aria-selected="true"
                  >
                    Information
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link"
                    id="Free-Practice-Question-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#Free-Practice-Question-tab-pane"
                    type="button"
                    role="tab"
                    aria-controls="Free-Practice-Question-tab-pane"
                    aria-selected="false"
                  >
                    Free Practice Question
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link"
                    id="Scores-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#Scores-tab-pane"
                    type="button"
                    role="tab"
                    aria-controls="Scores-tab-pane"
                    aria-selected="false"
                  >
                    Scores
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link"
                    id="Detail-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#Detail-tab-pane"
                    type="button"
                    role="tab"
                    aria-controls="Detail-tab-pane"
                    aria-selected="false"
                  >
                    Detail
                  </button>
                </li>
              </ul>
            </div>
            <div class="tab-content" id="myTabContent">
              <div
                class="pt-4 tab-pane fade show active"
                id="Information-tab-pane"
                role="tabpanel"
                aria-labelledby="Information-tab"
                tabindex="0"
              >
                <h5
                  class="ts-font-poppins ts-heading-05 ts-text-151e3a fw-bold mb-4"
                >
                  What is
                  <span>SHL1</span>
                  ?
                </h5>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-3"
                >
                  SHL is a company that provides psychometric assessments which
                  evaluate the numerical reasoning, verbal reasoning, mechanical
                  comprehension, and personality facets of potential employees.
                  It publishes its tests in over 30 languages and is perhaps the
                  most recognised assessment publisher globally.
                </p>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-3"
                >
                  SHL is renowned within the recruitment industry and highly
                  regarded by most major employers. Its assessments aid
                  employers in identifying candidates with high potential,
                  across a variety of industries and experience levels.
                </p>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-4"
                >
                  SHL’s technology often integrates with employer platforms,
                  thus presenting a more cost-effective and native testing
                  solution than other providers might offer.
                </p>
                <h5
                  class="ts-font-poppins ts-heading-05 ts-text-151e3a fw-bold mb-4"
                >
                  What is the
                  <span>SHL test</span>
                  ?
                </h5>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-3"
                >
                  SHL assessment, or SHL test, is a multiple-choice psychometric
                  test focused on a particular set of skills. The SHL range of
                  tests includes aptitude, personality, AMCAT and behavioural
                  question types, and different tests are used depending on the
                  employment level and role.
                </p>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-3"
                >
                  SHL devises its
                  <a href="#" class="ts-link-underline ts-text-Rhythm">
                    psychometric tests </a
                  >with occupational psychologists using scientific methodology,
                  based on the aggregation of assessment and workplace data
                  provided by employers. This allows them to target
                  characteristics correlated with high work performance.
                </p>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-3"
                >
                  While SHL does offer a handful of free tests with practice
                  questions on their website, the content of the assessments and
                  your performance results are limited. On this website, you can
                  take a comprehensive series of SHL practice test packages that
                  include explained solutions and tips to help you improve.
                </p>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-3"
                >
                  Like most assessment providers, SHL’s tests range in
                  difficulty level and skill set; see below for details and
                  examples of the main test types.
                </p>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium"
                >
                  You must understand which tests an employer has asked you to
                  complete so that you can select the right practice package for
                  you. The type of test you will face will typically be related
                  to the job at hand.
                </p>
              </div>
              <div
                class="pt-4 tab-pane fade"
                id="Free-Practice-Question-tab-pane"
                role="tabpanel"
                aria-labelledby="Free-Practice-Question-tab"
                tabindex="0"
              >
                <h5
                  class="ts-font-poppins ts-heading-05 ts-text-151e3a fw-bold mb-4"
                >
                  What is
                  <span>SHL2</span>
                  ?
                </h5>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-3"
                >
                  SHL is a company that provides psychometric assessments which
                  evaluate the numerical reasoning, verbal reasoning, mechanical
                  comprehension, and personality facets of potential employees.
                  It publishes its tests in over 30 languages and is perhaps the
                  most recognised assessment publisher globally.
                </p>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-3"
                >
                  SHL is renowned within the recruitment industry and highly
                  regarded by most major employers. Its assessments aid
                  employers in identifying candidates with high potential,
                  across a variety of industries and experience levels.
                </p>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-4"
                >
                  SHL’s technology often integrates with employer platforms,
                  thus presenting a more cost-effective and native testing
                  solution than other providers might offer.
                </p>
                <h5
                  class="ts-font-poppins ts-heading-05 ts-text-151e3a fw-bold mb-4"
                >
                  What is the
                  <span>SHL test</span>
                  ?
                </h5>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-3"
                >
                  SHL assessment, or SHL test, is a multiple-choice psychometric
                  test focused on a particular set of skills. The SHL range of
                  tests includes aptitude, personality, AMCAT and behavioural
                  question types, and different tests are used depending on the
                  employment level and role.
                </p>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-3"
                >
                  SHL devises its
                  <a href="#" class="ts-link-underline ts-text-Rhythm">
                    psychometric tests </a
                  >with occupational psychologists using scientific methodology,
                  based on the aggregation of assessment and workplace data
                  provided by employers. This allows them to target
                  characteristics correlated with high work performance.
                </p>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-3"
                >
                  While SHL does offer a handful of free tests with practice
                  questions on their website, the content of the assessments and
                  your performance results are limited. On this website, you can
                  take a comprehensive series of SHL practice test packages that
                  include explained solutions and tips to help you improve.
                </p>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-3"
                >
                  Like most assessment providers, SHL’s tests range in
                  difficulty level and skill set; see below for details and
                  examples of the main test types.
                </p>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium"
                >
                  You must understand which tests an employer has asked you to
                  complete so that you can select the right practice package for
                  you. The type of test you will face will typically be related
                  to the job at hand.
                </p>
              </div>
              <div
                class="pt-4 tab-pane fade"
                id="Scores-tab-pane"
                role="tabpanel"
                aria-labelledby="Scores-tab"
                tabindex="0"
              >
                <h5
                  class="ts-font-poppins ts-heading-05 ts-text-151e3a fw-bold mb-4"
                >
                  What is
                  <span>SHL3</span>
                  ?
                </h5>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-3"
                >
                  SHL is a company that provides psychometric assessments which
                  evaluate the numerical reasoning, verbal reasoning, mechanical
                  comprehension, and personality facets of potential employees.
                  It publishes its tests in over 30 languages and is perhaps the
                  most recognised assessment publisher globally.
                </p>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-3"
                >
                  SHL is renowned within the recruitment industry and highly
                  regarded by most major employers. Its assessments aid
                  employers in identifying candidates with high potential,
                  across a variety of industries and experience levels.
                </p>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-4"
                >
                  SHL’s technology often integrates with employer platforms,
                  thus presenting a more cost-effective and native testing
                  solution than other providers might offer.
                </p>
                <h5
                  class="ts-font-poppins ts-heading-05 ts-text-151e3a fw-bold mb-4"
                >
                  What is the
                  <span>SHL test</span>
                  ?
                </h5>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-3"
                >
                  SHL assessment, or SHL test, is a multiple-choice psychometric
                  test focused on a particular set of skills. The SHL range of
                  tests includes aptitude, personality, AMCAT and behavioural
                  question types, and different tests are used depending on the
                  employment level and role.
                </p>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-3"
                >
                  SHL devises its
                  <a href="#" class="ts-link-underline ts-text-Rhythm">
                    psychometric tests </a
                  >with occupational psychologists using scientific methodology,
                  based on the aggregation of assessment and workplace data
                  provided by employers. This allows them to target
                  characteristics correlated with high work performance.
                </p>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-3"
                >
                  While SHL does offer a handful of free tests with practice
                  questions on their website, the content of the assessments and
                  your performance results are limited. On this website, you can
                  take a comprehensive series of SHL practice test packages that
                  include explained solutions and tips to help you improve.
                </p>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-3"
                >
                  Like most assessment providers, SHL’s tests range in
                  difficulty level and skill set; see below for details and
                  examples of the main test types.
                </p>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium"
                >
                  You must understand which tests an employer has asked you to
                  complete so that you can select the right practice package for
                  you. The type of test you will face will typically be related
                  to the job at hand.
                </p>
              </div>
              <div
                class="pt-4 tab-pane fade"
                id="Detail-tab-pane"
                role="tabpanel"
                aria-labelledby="Detail-tab"
                tabindex="0"
              >
                <h5
                  class="ts-font-poppins ts-heading-05 ts-text-151e3a fw-bold mb-4"
                >
                  What is
                  <span>SHL4</span>
                  ?
                </h5>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-3"
                >
                  SHL is a company that provides psychometric assessments which
                  evaluate the numerical reasoning, verbal reasoning, mechanical
                  comprehension, and personality facets of potential employees.
                  It publishes its tests in over 30 languages and is perhaps the
                  most recognised assessment publisher globally.
                </p>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-3"
                >
                  SHL is renowned within the recruitment industry and highly
                  regarded by most major employers. Its assessments aid
                  employers in identifying candidates with high potential,
                  across a variety of industries and experience levels.
                </p>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-4"
                >
                  SHL’s technology often integrates with employer platforms,
                  thus presenting a more cost-effective and native testing
                  solution than other providers might offer.
                </p>
                <h5
                  class="ts-font-poppins ts-heading-05 ts-text-151e3a fw-bold mb-4"
                >
                  What is the
                  <span>SHL test</span>
                  ?
                </h5>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-3"
                >
                  SHL assessment, or SHL test, is a multiple-choice psychometric
                  test focused on a particular set of skills. The SHL range of
                  tests includes aptitude, personality, AMCAT and behavioural
                  question types, and different tests are used depending on the
                  employment level and role.
                </p>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-3"
                >
                  SHL devises its
                  <a href="#" class="ts-link-underline ts-text-Rhythm">
                    psychometric tests </a
                  >with occupational psychologists using scientific methodology,
                  based on the aggregation of assessment and workplace data
                  provided by employers. This allows them to target
                  characteristics correlated with high work performance.
                </p>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-3"
                >
                  While SHL does offer a handful of free tests with practice
                  questions on their website, the content of the assessments and
                  your performance results are limited. On this website, you can
                  take a comprehensive series of SHL practice test packages that
                  include explained solutions and tips to help you improve.
                </p>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium mb-3"
                >
                  Like most assessment providers, SHL’s tests range in
                  difficulty level and skill set; see below for details and
                  examples of the main test types.
                </p>
                <p
                  class="ts-font-poppins ts-desc-04 ts-text-Rhythm ts-fw-medium"
                >
                  You must understand which tests an employer has asked you to
                  complete so that you can select the right practice package for
                  you. The type of test you will face will typically be related
                  to the job at hand.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div
              class="ts-co-detail-qa ts-bg-edf5fe w-100 h-100 rounded-1 mb-4"
            >
              <h6
                class="ts-font-poppins ts-text-151e3a ts-heading-06 fw-bold text-center"
              >
                Example Questions and detailed Answers
              </h6>
              <a class="ts-btn-03" href="#">Practice Now</a>
            </div>
            <div>
              <div class="w-100 mb-02">
                <select
                  class="form-select ts-form-select-01 ts-focus-1 ts-desc-06 ts-text-Rhythm ts-font-manrope"
                  aria-label="Default select example"
                >
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>

              <div class="d-flex ts-gap-10 mb-04">
                <div
                  class="alert ts-category-btn alert-dismissible fade show mb-0"
                  role="alert"
                >
                  <span class="ts-text-Rhythm ts-font-poppins ts-desc-07"
                    >Category 1</span
                  >
                  <button
                    type="button"
                    class="btn-close ts-focus-0"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                  ></button>
                </div>
                <div
                  class="alert ts-category-btn alert-dismissible fade show mb-0"
                  role="alert"
                >
                  <span class="ts-text-Rhythm ts-font-poppins ts-desc-07"
                    >Category 2</span
                  >
                  <button
                    type="button"
                    class="btn-close ts-focus-0"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                  ></button>
                </div>
                <div
                  class="alert ts-category-btn alert-dismissible fade show mb-0"
                  role="alert"
                >
                  <span class="ts-text-Rhythm ts-font-poppins ts-desc-07"
                    >Category 3</span
                  >
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                  ></button>
                </div>
              </div>
              <div class="w-100 mb-4">
                <div class="input-group ts-border-gray">
                  <span
                    class="input-group-text ts-bg-fff border-0 pt-03 pb-03 pe-1 ps-3"
                    id="basic-addon1"
                  >
                    <a class="ts-flex-center" href="#"
                      ><img
                        width="15"
                        height="15"
                        loading="lazy"
                        src="{{ asset('assets/images/front/icon/search-Icon.svg')}}"
                        alt="..."
                    /></a>
                  </span>
                  <input
                    type="text"
                    class="form-control ts-focus-0 ts-text-151e3a ts-font-inter ts-desc-05 border-0"
                    placeholder="Search"
                    aria-describedby="basic-addon1"
                  />
                </div>
              </div>
              <div class="w-100 ts-border-gray ts-co-testing-card">
                <p class="ts-desc-05 ts-text-151e3a ts-font-poppins mb-0">
                  Shl Verbal Testing
                </p>
                <p class="ts-font-poppins ts-desc-06 ts-text-Rhythm mb-0">
                  39 test found
                </p>
              </div>
              <div class="w-100 ts-border-gray ts-co-testing-card">
                <p class="ts-desc-05 ts-text-151e3a ts-font-poppins mb-0">
                  Shl Verbal Testing
                </p>
                <p class="ts-font-poppins ts-desc-06 ts-text-Rhythm mb-0">
                  39 test found
                </p>
              </div>
              <div class="w-100 ts-border-gray ts-co-testing-card">
                <p class="ts-desc-05 ts-text-151e3a ts-font-poppins mb-0">
                  Shl Verbal Testing
                </p>
                <p class="ts-font-poppins ts-desc-06 ts-text-Rhythm mb-0">
                  39 test found
                </p>
              </div>
              <div class="w-100 ts-border-gray ts-co-testing-card">
                <p class="ts-desc-05 ts-text-151e3a ts-font-poppins mb-0">
                  Shl Verbal Testing
                </p>
                <p class="ts-font-poppins ts-desc-06 ts-text-Rhythm mb-0">
                  39 test found
                </p>
              </div>
              <div class="w-100 ts-border-gray ts-co-testing-card">
                <p class="ts-desc-05 ts-text-151e3a ts-font-poppins mb-0">
                  Shl Verbal Testing
                </p>
                <p class="ts-font-poppins ts-desc-06 ts-text-Rhythm mb-0">
                  39 test found
                </p>
              </div>
              <div class="w-100 ts-border-gray ts-co-testing-card">
                <p class="ts-desc-05 ts-text-151e3a ts-font-poppins mb-0">
                  Shl Verbal Testing
                </p>
                <p class="ts-font-poppins ts-desc-06 ts-text-Rhythm mb-0">
                  39 test found
                </p>
              </div>
              <div class="w-100 ts-border-gray ts-co-testing-card">
                <p class="ts-desc-05 ts-text-151e3a ts-font-poppins mb-0">
                  Shl Verbal Testing
                </p>
                <p class="ts-font-poppins ts-desc-06 ts-text-Rhythm mb-0">
                  39 test found
                </p>
              </div>
              <div class="w-100 ts-border-gray ts-co-testing-card">
                <p class="ts-desc-05 ts-text-151e3a ts-font-poppins mb-0">
                  Shl Verbal Testing
                </p>
                <p class="ts-font-poppins ts-desc-06 ts-text-Rhythm mb-0">
                  39 test found
                </p>
              </div>
              <div class="w-100 ts-border-gray ts-co-testing-card">
                <p class="ts-desc-05 ts-text-151e3a ts-font-poppins mb-0">
                  Shl Verbal Testing
                </p>
                <p class="ts-font-poppins ts-desc-06 ts-text-Rhythm mb-0">
                  39 test found
                </p>
              </div>
              <div class="w-100 ts-border-gray ts-co-testing-card">
                <p class="ts-desc-05 ts-text-151e3a ts-font-poppins mb-0">
                  Shl Verbal Testing
                </p>
                <p class="ts-font-poppins ts-desc-06 ts-text-Rhythm mb-0">
                  39 test found
                </p>
              </div>
              <div class="w-100 ts-border-gray ts-co-testing-card">
                <p class="ts-desc-05 ts-text-151e3a ts-font-poppins mb-0">
                  Shl Verbal Testing
                </p>
                <p class="ts-font-poppins ts-desc-06 ts-text-Rhythm mb-0">
                  39 test found
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
