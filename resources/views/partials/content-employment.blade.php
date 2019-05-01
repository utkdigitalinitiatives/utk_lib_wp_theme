<div class="page-body--content--inner">
    @if(get_the_title())
        <div class="page-body--content--title">
            <h1>@php echo get_the_title(); @endphp</h1>
        </div>
    @endif
    <div class="page-body--content--body"><?php

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

        /*
         * functionality for required documents
         */

        $required_docs      = get_field('employment_required');

        if ($required_docs) {
            $required_docs_gf = implode($required_docs, ',');
            $gf_shortcode = '[gravityform id=4 ajax=true field_values="options=' . $required_docs_gf . '"]';
            $next = '?apply=1&step=2';
        } else {
            $next = $application_url;
        }

        /*
         * get current step
         */

        if (isset($_REQUEST['step'])) {
            $step = sanitize_text_field($_REQUEST['step']);
        } else {
            $step = 1;
        }

        /*
         * get current step
         */

        if (isset($_REQUEST['step'])) {
            $step = sanitize_text_field($_REQUEST['step']);
        } else {
            $step = 1;
        }

        ?>

        <?php if (!empty($required_docs)) : ?>
        <div class="employment-steps">

            <?php if ($step == 1) { ?>
            <div class="step--one active">Description</div>
            <div class="step--two">Submit Documents</div>
            <div class="step--three final">Complete Application</div>
            <?php } ?>
            <?php if ($step == 2) { ?>
            <div class="step--one complete"><span class="icon-ok"></span>Description</div>
            <div class="step--two active">Submit Documents</div>
            <div class="step--three">Complete Application</div>
            <?php } ?>

        </div>
        <?php else : ?>

        <?php endif; ?>

        <?php if ($step == 1) : ?>

        <?php if ($category->name != 'Faculty') : ?>
        <a class="btn btn-default" href="<?php echo $next; ?>">Apply for Position</a>
        <?php endif; ?>

        <div class="employment-options employment-options-flex">
            <?php if (!empty($appointment_rank)) : ?>
            <div class="employment-options--item employment-category">
                <strong>Appointment Rank</strong><br>
                <?php echo $appointment_rank; ?>
            </div>
            <?php endif; ?>
        </div>

        <div class="employment-options">
            <?php if (!empty($department->name)) : ?>
            <div class="employment-options--item employment-category">
                <strong>Department</strong><br>
                <?php echo $department->name; ?>
            </div>
            <?php endif; ?>
        </div>

        <div class="employment-options">
            <?php if (!empty($reports_tp)) : ?>
            <div class="employment-options--item employment-category">
                <strong>Reports To:</strong><br>
                <?php echo $reports_tp; ?>
            </div>
            <?php endif; ?>
        </div>

        <div class="employment-options employment-options-flex">
            <?php if (!empty($pay_grade)) : ?>
            <div class="employment-options--item employment-category">
                <strong>Pay Grade</strong><br>
                <?php echo $pay_grade; ?>
            </div>
            <?php endif; ?>
            <?php if (!empty($salary)) : ?>
            <div class="employment-options--item employment-category">
                <strong>Salary</strong><br>
                <?php echo $salary; ?>
            </div>
            <?php endif; ?>
            <?php if (!empty($available)) : ?>
            <div class="employment-options--item employment-category">
                <strong>Available</strong><br>
                <?php echo $available; ?>
            </div>
            <?php endif; ?>
            <?php if ($category->name != 'Faculty') : ?>
            <?php if (!empty($category->name)) : ?>
            <div class="employment-options--item employment-category">
                <strong>Position Type</strong><br>
                <?php echo $category->name; ?>
            </div>
            <?php endif; ?>
            <?php endif; ?>
        </div>

        <?php if (!empty($hours)) : ?>
        <h2>Hours</h2>
        <?php echo $hours; ?>
        <?php endif; ?>

        <?php if (!empty($location)) : ?>
        <h2>Location</h2>
        <?php echo $location; ?>
        <?php endif; ?>

        <?php if (!empty($description)) : ?>
        <h2>Description</h2>
        <?php echo $description; ?>
        <?php endif; ?>

        <?php if (!empty($responsibilities)) : ?>
        <h2>Responsibilities &amp; Duties</h2>
        <?php echo $responsibilities; ?>
        <?php endif; ?>

        <?php if (!empty($qualifications_r)) : ?>
        <h2>Required Qualifications</h2>
        <?php echo $qualifications_r; ?>
        <?php endif; ?>

        <?php if (!empty($qualifications_p)) : ?>
        <h2>Preferred Qualifications</h2>
        <?php echo $qualifications_p; ?>
        <?php endif; ?>

        <?php if (!empty($environment)) : ?>
        <h2>Environment</h2>
        <?php echo $environment; ?>
        <?php endif; ?>

        <?php if (!empty($benefits)) : ?>
        <h2>Benefits</h2>
        <?php echo $benefits; ?>
        <?php endif; ?>

        <?php if (!empty($instructions)) : ?>
        <h2>Application Procedures</h2>
        <?php echo $instructions; ?>
        <?php endif; ?>

        <?php $eeo = get_option('options_employment_options_statement'); ?>
        <div class="employment-eeo">
            <?php print wpautop($eeo); ?>
        </div>

        <?php if ($category->name != 'Faculty') : ?>
        <a id="employment-footer-apply" class="btn btn-default" href="<?php echo $next; ?>">Apply for Position</a>
        <?php endif; ?>

        <?php elseif ($step == 2) : ?>

        <?php echo do_shortcode($gf_shortcode); ?>

        <?php if (in_array($category->slug, ['sla'])) : ?>
        <div class="employment-sla-directions">
            <?php echo get_post_content_by_id(63); ?>
        </div>
        <?php endif; ?>

        <div id="employment-back-button">
            <a class="btn btn-outline" href="?apply=0&step=<?php echo $step - 1; ?>">Previous</a>
        </div>

        <?php endif; ?>


    </div>
</div>