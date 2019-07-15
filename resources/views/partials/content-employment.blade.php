<div class="page-body--content--inner">
    @if(get_the_title())
        <div class="page-body--content--title">
            <h1>@php echo get_the_title(); @endphp</h1>
        </div>
    @endif
    <div class="page-body--content--body">
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

        $application_url    = get_field('employment_application_url');


       @endphp

        <a class="btn btn-default" href="@php echo $apply; @endphp">Apply for Position</a>

        <div class="employment-options employment-options-flex">
            @if (!empty($appointment_rank))
            <div class="employment-options--item employment-category">
                <strong>Appointment Rank</strong><br>
                @php echo $appointment_rank; @endphp
            </div>
            @endif
        </div>

        <div class="employment-options">
            @if (!empty($department->name))
            <div class="employment-options--item employment-category">
                <strong>Department</strong><br>
                @php echo $department->name; @endphp
            </div>
            @endif
        </div>

        <div class="employment-options">
            @if (!empty($reports_tp))
            <div class="employment-options--item employment-category">
                <strong>Reports To:</strong><br>
                @php echo $reports_tp; @endphp
            </div>
            @endif
        </div>

        <div class="employment-options employment-options-flex">
            @if (!empty($pay_grade))
            <div class="employment-options--item employment-category">
                <strong>Pay Grade</strong><br>
                @php echo $pay_grade; @endphp
            </div>
            @endif
            @if (!empty($salary))
            <div class="employment-options--item employment-category">
                <strong>Salary</strong><br>
                @php echo $salary; @endphp
            </div>
            @endif
            @if (!empty($available))
            <div class="employment-options--item employment-category">
                <strong>Available</strong><br>
                @php echo $available; @endphp
            </div>
            @endif
            @if ($category->name != 'Faculty')
                @if (!empty($category->name))
                    <div class="employment-options--item employment-category">
                        <strong>Position Type</strong><br>
                        @php echo $category->name; @endphp
                    </div>
                @endif
            @endif
        </div>

        @if (!empty($hours))
            <h2>Hours</h2>
            @php echo $hours; @endphp
        @endif

        @if (!empty($location))
            <h2>Location</h2>
            @php echo $location; @endphp
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

        <div class="employment-eeo">
            @php print wpautop(get_option('options_employment_options_statement')); @endphp
        </div>

    </div>
</div>