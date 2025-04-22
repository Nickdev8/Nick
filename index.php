<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Nick's story</title>
  <link rel="stylesheet" href="https://css.hackclub.com/theme.css" />
  <link rel="stylesheet" href="style2.css">
  <link rel="stylesheet" href="style.css">

  <script src="script.js" defer></script>
</head>

<body>
  <a class="banner" target="_blank" href="https://hackclub.com/">
    <img src="images/flag-orpheus-top.png" />
  </a>

  <!-- Language Switcher -->
  <div style="position: absolute; top: 10px; right: 10px;">
    <button id="languageSwitcher" onclick="switchLanguage()"
      style="padding: 5px; font-size: 14px; display: flex; align-items: center; gap: 5px;">
      <span id="languageFlag">
        <img src="https://upload.wikimedia.org/wikipedia/commons/8/83/Flag_of_the_United_Kingdom_%283-5%29.svg"
          alt="English Flag" width="16" height="12" />
      </span>
      <span id="languageText">English</span>
    </button>
  </div>

  <header>
    <h1 class="ultratitle">Nick Essleman</h1>
    <p class="headline">A passionate student who loves creating and learning.</p>
  </header>

  <div class="card container">
    <h2 class="headline" data-en="About Me" data-nl="Over Mij">About Me</h2>
    <p data-en="I'm <?php echo floor((time() - strtotime('2008-08-08')) / (365.25 * 24 * 60 * 60) * 100) / 100; ?> years old."
      data-nl="Ik ben <?php echo floor((time() - strtotime('2008-08-08')) / (365.25 * 24 * 60 * 60) * 100) / 100; ?> jaar oud.">
      I'm <?php echo floor((time() - strtotime('2008-08-08')) / (365.25 * 24 * 60 * 60) * 100) / 100; ?> years old.
    </p>
    <ul>
      <li id="months-old"></li>
      <li id="days-old"></li>
      <li id="minutes-old"></li>
      <li id="seconds-old"></li>
    </ul>
    <script>
      function updateAge() {
        const birthDate = new Date('2008-08-08T00:00:00');
        const now = new Date();
        const diff = now - birthDate;

        const seconds = Math.floor(diff / 1000);
        const minutes = Math.floor(seconds / 60);
        const days = Math.floor(seconds / (24 * 60 * 60));
        const months = Math.floor(days / 30.44); // Approximate month length

        document.getElementById('seconds-old').textContent = `${seconds} seconds`;
        document.getElementById('minutes-old').textContent = `${minutes} minutes`;
        document.getElementById('days-old').textContent = `${days} days`;
        document.getElementById('months-old').textContent = `${months} months`;
      }

      const languages = [
        {
          code: 'en',
          name: 'English',
          flag: `<img src="https://upload.wikimedia.org/wikipedia/commons/8/83/Flag_of_the_United_Kingdom_%283-5%29.svg" alt="English Flag" width="16" height="12" />`
        },
        {
          code: 'nl',
          name: 'Dutch',
          flag: `<img src="https://upload.wikimedia.org/wikipedia/commons/2/20/Flag_of_the_Netherlands.svg" alt="Dutch Flag" width="16" height="12" />`
        }
      ];
      let currentLanguageIndex = 0;

      function switchLanguage() {
        currentLanguageIndex = (currentLanguageIndex + 1) % languages.length;
        const selectedLanguage = languages[currentLanguageIndex];
        document.getElementById('languageText').textContent = selectedLanguage.name;
        document.getElementById('languageFlag').innerHTML = selectedLanguage.flag;
        document.querySelectorAll('[data-en]').forEach(element => {
          element.textContent = element.getAttribute(`data-${selectedLanguage.code}`);
        });
      }

      updateAge();
      setInterval(updateAge, 1000);
    </script>
    <p data-en="I'm a student at Media College Amsterdam, studying Full Stack Software Development."
      data-nl="Ik ben een student aan het Media College Amsterdam en studeer Full Stack Software Development.">
      I'm a student at <a href="https://www.ma-web.nl/">Media College Amsterdam</a>, studying
      <code>Full Stack Software Development</code>.
    </p>
  </div>

  <div class="card container">
    <h2 class="headline">My Programming Journey</h2>
    <ol>
      <li>
        <strong>Getting Started:</strong> I began coding at 9 years old through trial and error.
        <ul>
          <li>Started with <code>C#</code> in Unity and <code>Python</code>.</li>
          <li>Experimented with a Raspberry Pi and set up my own Minecraft server.</li>
          <li>Later explored Godot and learned <code>GD Script</code>.</li>
        </ul>
      </li>
      <li>
        <strong>Current Education:</strong> I joined Media College Amsterdam.
        <ul>
          <li>Learned the basics of <code>HTML</code>, <code>CSS</code>, <code>JavaScript</code>, and <code>PHP</code>.
          </li>
          <li>Discovered <a href="#foundHackClub" class="pill">Hack Club</a>.</li>
          <li>Expanded my skills to include <code>Java</code>, <code>C</code>, <code>Lua</code>, <code>Bash</code>, and
            <code>Minecraft Datapacks</code>.
          </li>
        </ul>
      </li>
      <li>
        <strong>Continuous Learning:</strong> I am constantly learning new things.
        <ul>
          <li>Currently exploring <code>Rust</code>, <code>Go</code>, and <code>Swift</code>.</li>
        </ul>
      </li>
    </ol>
    <p>Like most things in life, my journey is a <strong>work in progress</strong>.</p>
  </div>

  <div class="card container" id="foundHackClub">
    <h2 class="headline">How I Joined Hack Club</h2>
    <ol>
      <li>
        <strong>Discovery:</strong> My father forwarded me a link about High Seas from an email he received from Home
        Assistant.
        <ul>
          <li>I clicked the link, read about it, and thought it looked cool.</li>
          <li>Without hesitation, I joined via High Seas, and it has been an amazing experience ever since.</li>
        </ul>
      </li>
      <li>
        <strong>Community:</strong> I joined the <a href="https://hackclub.com/slack/">Hack Club Slack</a>.
      </li>
      <li>
        <strong>Now:</strong> I am an active member of Hack Club!
      </li>
    </ol>
  </div>

  <div class="card container" style="margin-top: var(--spacing-5)">
    <h2 class="headline">Things I Made</h2>
    <ul>
      <li>
        <strong>Party VR:</strong> A multiplayer co-location VR game available on the <strong>Meta Store</strong>.
        <br>
        <a href="https://www.meta.com/en-gb/experiences/partyvr/9355384034552901/?require_login=true" target="_blank"
          class="pill">Party VR</a>
      </li>
      <li>
        <strong>Drift Game:</strong> A demo for a realistic car controller.
        <br>
        <iframe frameborder="0"
          src="https://itch.io/embed/3264500?bg_color=f9fafc&amp;fg_color=1f2d3d&amp;link_color=ec3750&amp;border_color=121217"
          width="552" height="167">
          <a href="https://nikkcc.itch.io/drift">Drift Game in the City by Nick</a>
        </iframe>
        <br>
        <a href="https://nikkcc.itch.io/drift" target="_blank" class="pill">Drift Game</a>
      </li>
      <li>
        <strong>Monkey Swing:</strong> A simple yet challenging rage game.
        <br>
        <iframe frameborder="0"
          src="https://itch.io/embed/2254225?bg_color=f9fafc&amp;fg_color=1f2d3d&amp;link_color=ec3750&amp;border_color=121217"
          width="552" height="167">
          <a href="https://nikkcc.itch.io/ms">MonkeySwing by Nick</a>
        </iframe>
        <br>
        <a href="https://nikkcc.itch.io/ms" target="_blank" class="pill">MonkeySwing</a>
      </li>
    </ul>
  </div>

  <div class='card container'>
    <h2 class="headline">An Ai Message about Nick:</h2>
    <h2 id="js--ai-Message">Loading</h2>
    <h2 class="caption">This makes use of <a href="http://ai.hackclub.com">Ai.HackClub.com</a></h2>
  </div>

  <!-- Image Collage Section -->
  <div class="container wide noMarginOrPadding" style="margin-top: var(--spacing-5); text-align: center;">
    <h2 class="headline">Juice 2025</h2>
    <h2 class="subheadline">Juice was a HackClub event, hosted by Thomas Stubblefield</h2>
    <div class="grid" id="imageGrid">
      <?php include './load_images.php'; // Load the first set of images ?>
    </div>
    <button id="loadMore" onclick="loadMoreImages()">Load More</button>

    <!-- Fullscreen Preview Modal -->
    <div id="preview" class="preview">
      <span class="close" onclick="closePreview()">&times;</span>
      <img id="previewImage" src="" alt="Preview">
    </div>
  </div>


  <footer style="margin-top: var(--spacing-5); text-align: center; font-size: 14px; color: #555;">
    <p>
      This page was created by Nick Essleman and is open source.
      <a href="https://github.com/Nickdev8/Nick" target="_blank" style="color: #ec3750; text-decoration: none;">View the
        source code on GitHub</a>.
    </p>
    <p>
      It uses the <a href="https://css.hackclub.com/" target="_blank"
        style="color: #ec3750; text-decoration: none;">Hack Club CSS library</a>.
    </p>
    <p style="font-size: 12px; margin-top: 10px;">
      Licensed under the <a href="https://opensource.org/licenses/MIT" target="_blank"
        style="color: #ec3750; text-decoration: none;">MIT License</a>.
    </p>
  </footer>
</body>

</html>