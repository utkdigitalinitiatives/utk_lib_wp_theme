@php

    Namespace App\Controllers;

@endphp
<div class="page-body--content--inner utk-employment">
    @if(get_the_title())
        <div class="page-body--content--title">
            <h1>@php echo get_the_title(); @endphp</h1>
        </div>
    @endif
    <div class="page-body--content--body utk-employment--body">
        @php

        /*
         * template layout for employment posts
         */

        $category_id        = get_field('employment_category');
        $category           = get_term($category_id);

        $pay_grade          = get_field('employment_pay_grade');
        $salary             = get_field('employment_salary');
        $hours              = get_field('employment_hours');
        $location           = get_field('employment_location');
        $salary             = get_field('employment_salary');
        $salary             = get_field('employment_salary');
        $description        = get_field('employment_description');
        $responsibilities   = get_field('employment_responsibilities');
        $qualifications_r   = get_field('employment_qualifications_required');
        $qualifications_p   = get_field('employment_qualifications_preferred');
        $environment        = get_field('employment_environment');
        $benefits           = get_field('employment_benefits');
        $instructions       = get_field('employment_instructions');

        $appointment_rank   = get_field('employment_appointment_rank');
        $department_id      = get_field('employment_department');
        $department         = get_term($department_id);
        $reports_tp         = get_field('employment_reports');
        $available          = get_field('employment_available');

        $method             = get_field('employment_apply_method');
        $email              = get_field('employment_email');
        $application_url    = get_field('employment_application_url');

        if ($method === 'email') :
            $apply = 'mailto:' . $email;
        elseif ($method === 'url') :
            $apply = $application_url;
        endif;

       @endphp

        <div class="utk-employment--options utk-employment--options--head">
            @if (!empty($department->name))
                <div class="utk-employment--options--item utk-employment--category">
                    <strong>Department</strong>
                    @php echo $department->name; @endphp
                </div>
            @endif
            @if (!empty($category->name))
                <div class="utk-employment--options--item utk-employment--category">
                    <strong>Position Type</strong>
                    @php echo $category->name; @endphp
                </div>
            @endif
            <a class="btn btn-default btn-with-icon" href="@php echo $apply; @endphp">Apply for Position <span class="icon-right-open"></span></a>
        </div>

        @if (!empty($appointment_rank) || !empty($reports_tp) || !empty($pay_grade) || !empty($salary) || !empty($available) || !empty($hours) || !empty($location))
        <div class="utk-employment--options utk-employment--options--meta">
            @if (!empty($appointment_rank))
                <div class="utk-employment--options--item">
                    <strong>Appointment Rank</strong>
                    @php echo $appointment_rank; @endphp
                </div>
            @endif
            @if (!empty($reports_tp))
                <div class="utk-employment--options--item">
                    <strong>Reports To</strong>
                    @php echo $reports_tp; @endphp
                </div>
            @endif
            @if (!empty($pay_grade))
                <div class="utk-employment--options--item">
                    <strong>Pay Grade</strong>
                    @php echo $pay_grade; @endphp
                </div>
            @endif
            @if (!empty($salary))
                <div class="utk-employment--options--item">
                    <strong>Salary</strong>
                    @php echo $salary; @endphp
                </div>
            @endif
            @if (!empty($available))
                <div class="utk-employment--options--item">
                    <strong>Available</strong>
                    @php echo $available; @endphp
                </div>
            @endif
            @if (!empty($hours))
                <div class="utk-employment--options--item">
                    <strong>Hours</strong>
                    @php echo $hours; @endphp
                </div>
            @endif
            @if (!empty($location))
                <div class="utk-employment--options--item">
                    <strong>Location</strong>
                    @php echo $location; @endphp
                </div>
            @endif
        </div>
        @endif

        @if (!empty($description))
            <h2>Description</h2>
            @php echo $description; @endphp
        @endif

        @if (!empty($responsibilities))
            <h2>Responsibilities &amp; Duties</h2>
            @php echo $responsibilities; @endphp
        @endif

        @if (!empty($qualifications_r))
            <h2>Required Qualifications</h2>
            @php echo $qualifications_r; @endphp
        @endif

        @if (!empty($qualifications_p))
            <h2>Preferred Qualifications</h2>
            @php echo $qualifications_p; @endphp
        @endif

        @if (!empty($environment))
            <h2>Environment</h2>
            @php echo $environment; @endphp
        @endif

        @if (!empty($benefits))
            <h2>Benefits</h2>
            @php echo $benefits; @endphp
        @endif

        @if (!empty($instructions))
            <h2>Application Procedures</h2>
            @php echo $instructions; @endphp
        @endif

        <a class="btn btn-default btn-with-icon" href="@php echo $apply; @endphp">Apply for Position <span class="icon-right-open"></span></a>

        @php echo App::renderEndDots() @endphp

        <div class="utk-employment--eeo">
            @php print wpautop(get_option('options_employment_options_statement')); @endphp
        </div>

    </div>
</div>