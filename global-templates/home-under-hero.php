<?php
  $homeHero = new HomeHero();
  $homeHeroExclude = $homeHero->SetExclude();

  $homeUnderHero = new HomeUnderHero();
  $homeUnderHero->DisplayUnderHero($homeHeroExclude);
?>