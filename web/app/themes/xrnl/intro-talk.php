<?php
/**
 * Template name: Intro talk
 */

get_header(); ?>

<div class="p-3 p-lg-5 text-center text-white" style="background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.45)), url('<?php the_field('hero_background_url') ?>') no-repeat center center/cover;">
  <h1 class="display-2 my-5"><?php the_field('hero_title'); ?></h1>
</div>

<section class="px-3 px-lg-5 py-5">
  <div class="row">
    <h2 class="col-12 text-center"><?php the_field('center_section_heading'); ?></h2>
    <div class="mt-2 mb-3 col-10 col-md-8 col-lg-7 mx-auto text-center">
      <span class="px-2 py-1">
        <span id="countdown-info" class="font-weight-bold"><?php _e('The talk will start in', 'theme-xrnl') ?></span>
        <?php $date = get_field('date'); ?>
        <span
          id="countdown"
          class="font-xr text-nowrap text-white bg-xr-black px-2 py-1"
          data-start-day=   "<?php echo $date['day_of_the_week']; ?>"
          data-start-hours= "<?php echo $date['hours']; ?>"
          data-start-mins=  "<?php echo $date['min']; ?>"
          data-duration=    "<?php echo $date['duration']; ?>"
          data-str-on=      "<?php _e('The talk is on', 'theme-xrnl') ?>"
          data-str-now=     "<?php _e('now', 'theme-xrnl') ?>"
          data-str-days=    "<?php _e('days', 'theme-xrnl') ?>"
          data-str-hours=   "<?php _e('hours', 'theme-xrnl') ?>"
          data-str-minutes= "<?php _e('minutes', 'theme-xrnl') ?>"
          data-str-seconds= "<?php _e('seconds', 'theme-xrnl') ?>"
          data-str-day=     "<?php _e('day', 'theme-xrnl') ?>"
          data-str-hour=    "<?php _e('hour', 'theme-xrnl') ?>"
          data-str-minute=  "<?php _e('minute', 'theme-xrnl') ?>"
          data-str-second=  "<?php _e('second', 'theme-xrnl') ?>"
        ></span>
      </span>
    </div>
    <p class="col-10 col-md-8 col-lg-7 mx-auto text-center"><?php the_field('center_section_top_text') ?></p>
    <div class="col-12 col-sm-10 col-md-10 col-lg-9 py-5 mx-auto row" style="min-height: 30rem; background: url('<?php the_field('screenshot_url') ?>') no-repeat center center/cover;">
      <div class="col-12 align-self-end text-center">
        <?php $view_btn = get_field('view_button'); ?>
        <a href="<?php echo $view_btn['view_button_link']; ?>" class="btn btn-lg btn-yellow"><?php echo $view_btn['view_button_label']; ?></a>
      </div>
    </div>
    <p class="col-11 col-md-9 col-lg-8 mx-auto mt-3 text-center"><?php the_field('center_section_top_text') ?></p>
  </div>
</section>

<section class="bg-blue px-3 px-lg-5 py-5">
  <div class="row">
    <h2 class="col-12 text-center"><?php the_field('share_section_heading') ?></h2>
    <p class="col-11 col-md-9 col-lg-8 mx-auto text-center"><?php the_field('share_section_text') ?></p>

    <div class="col-12 d-flex flex-column align-items-center">
      <?php $share_buttons = get_field('share_buttons') ?>
      <?php if(is_array($share_buttons)) : ?>
        <?php foreach ($share_buttons as $button) : ?>
          <?php if ($button['button_label']): ?>
            <a class="btn btn-black my-2 mx-2" href="<?php echo($button['button_link']); ?>" target="_blank"><?php echo($button['button_label']); ?></a>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php endif; ?>

      <button
        type="button"
        id="copy-url-btn"
        class="btn btn-black my-2 mx-2"
        data-copied-str="<?php _e('Copied!', 'theme-xrnl') ?>"
        >
        <?php _e('Copy the link', 'theme-xrnl') ?>
      </button>
      <input id="clipboard-val" type="text" name="clipboard" value="" style="opacity: 0;">
    </div>
  </div>
</section>

<script type="text/javascript">
  jQuery(document).ready(function() {

    jQuery('#copy-url-btn').click(function(e) {
      e.preventDefault();
      var copyLabel = jQuery(this).html();
      var copiedLabel = jQuery(this).data('copied-str');
      var url = window.location.href;
      jQuery('#clipboard-val').val(url).select();
      document.execCommand('copy');
      jQuery(this).html(copiedLabel);
      setTimeout(function (){
        jQuery('#copy-url-btn').html(copyLabel);
      }, 1000);
    });

    countdownTimer();
    setInterval(countdownTimer, 60000); // refresh interval in milliseconds

  });

  const data = document.querySelector('#countdown').dataset;

  function countdownTimer() {
    const talkDay =       Number(data.startDay);
    const talkHrs =       Number(data.startHours);
    const talkMin =       Number(data.startMins);
    const talkDuration =  Number(data.duration);

    let timeRemaining = data.strNow;
    const now = new Date();
    let startTime = getNextTalk(talkDay, talkHrs, talkMin);

    if (now.getDay() === talkDay) { // talk is on today
      var endTime = new Date(now);
      endTime.setHours(talkHrs + talkDuration, talkMin, 0);

      if (now < endTime) { // talk hasn't ended yet
        startTime.setDate(startTime.getDate() - 7);
      }

    } else { // talk is in the future
      var endTime = new Date(startTime);
      endTime.setHours(endTime.getHours() + talkDuration);
    }

    // adjust display for not using seconds
    endTime.setMinutes(endTime.getMinutes() - 1);
    const difference = +startTime - +now;
    startTime.setMinutes(startTime.getMinutes() - 1);

    if (now > startTime && now < endTime) {
      document.getElementById("countdown-info").innerHTML = data.strOn;
    } else {
      if (difference > 0) {
        const counters = {
          days: Math.floor(difference / (1000 * 60 * 60 * 24)),
          hours: Math.floor((difference / (1000 * 60 * 60)) % 24),
          minutes: Math.floor((difference / 1000 / 60) % 60),
          seconds: Math.floor((difference / 1000) % 60)
        };

        const units = ['days', 'hours', 'minutes', 'seconds'];
        units.pop(); // Not using seconds for now. To show seconds, comment out this line and incrase the refresh rate with something like setInterval(countdownTimer, 250) above
        let parts = [];
        units.forEach(unit => {
          if(counters[unit]) {
            parts.push(counters[unit] + " " + getLabel(unit, counters[unit]));
          }
        });
        timeRemaining = parts.join(" ");
      }
    }
    document.getElementById("countdown").innerHTML = timeRemaining;
  }

  // Return the date/time of the upcoming talk, given day of week and start time
  function getNextTalk(day=0, hours=0, mins=0) {
    let nextTalk = new Date();
    nextTalk.setDate(nextTalk.getDate() + (day - 1 - nextTalk.getDay() + 7) % 7 + 1);
    nextTalk.setHours(hours, mins, 0);
    return nextTalk;
  }

  function getLabel(unit, value) {
    return value === 1 ? labelsSingular[unit] : labelsPlural[unit];
  }

  const labelsPlural = {
    days: data.strDays,
    hours: data.strHours,
    minutes: data.strMinutes,
    seconds: data.strSeconds
  }

  const labelsSingular = {
    days: data.strDay,
    hours: data.strHour,
    minutes: data.strMinute,
    seconds: data.strSecond
  }

</script>
<?php get_footer(); ?>
