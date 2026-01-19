<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SEO PRIMARY TAGS -->
    <title>Author's Corner | ECHOTONGUE - Space Fantasy by Hermona Zeleke</title>
    <meta name="description" content="Step into the Author's Corner of ECHOTONGUE. Read reflections on world-building, writing updates, and the creative journey behind the Zureyan Tablets by Hermona Zeleke.">
    <meta name="keywords" content="ECHOTONGUE, Hermona Zeleke, Space Fantasy, Zureyan Tablets, Author Blog, Science Fiction Writing, World Building">
    <link rel="canonical" href="https://echotongue.com/blog.php" />

    <!-- OPEN GRAPH / FACEBOOK -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://echotongue.com/blog.php">
    <meta property="og:title" content="Author's Corner | ECHOTONGUE Official">
    <meta property="og:description" content="Glimpses from the writing desk and reflections on the ECHOTONGUE universe.">
    <meta property="og:image" content="https://echotongue.com/assets/echologo.webp">

    <!-- TWITTER SEO -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="Author's Corner | ECHOTONGUE">
    <meta property="twitter:description" content="Reflections on the creative journey of the ECHOTONGUE universe.">
    <meta property="twitter:image" content="https://echotongue.com/assets/echologo.webp">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="assets/echologo.webp" sizes="32x32" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/echologo.webp">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Orbitron:wght@700;900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&family=Raleway:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #c91313c9;
            --secondary-color: rgba(255, 255, 255, 0.884);
            --accent-color: #7d1c1c;
            --light-bg: #f9f0f0;
            --card-bg: #ffffff;
            --text-dark: #777776;
            --text-light: #6b4d3a;
            --text-muted: #a08c7a;
            --border-color: #e8d6d6;
            --shadow: 0 10px 30px rgba(139, 90, 43, 0.08);
            --shadow-hover: 0 15px 40px rgba(139, 90, 43, 0.15);
            --transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
        }

        body {
            background-image: url(assets/leaves.webp);
            scroll-behavior: smooth;
            animation: twinkle 10s infinite secondary;
            display: flex;
            flex-direction: column;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        .authors-thoughts {
            position: relative;
            min-height: 100vh;
            margin-top: 20px;
        }

        .thoughts-container {
            max-width: 1100px;
            margin: 0 auto;
            position: relative;
        }

        .thoughts-header {
            text-align: center;
            margin-bottom: 40px;
            padding: 20px 20px;
            background: linear-gradient(160deg, #161616, #0a0a0a);
            color: #e0e0e0; 
            border-radius: 20px;
            box-shadow: rgb(110, 110, 110) 0 0 0px 0px;
            border: 1px solid rgba(14, 2, 2, 0.753);
            position: relative;
            z-index: 2;
        }

        .liner {
            content: ' ';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 150px;
            height: 4px;
            background-color: var(--primary-red);
        }

        .author-name {
            font-family: 'Cinzel', serif;
            font-size: 1.9rem;
            font-weight: 650;
            color: rgb(240, 236, 236);
            margin-bottom: 18px;
            line-height: 0.9;
        }

        .author-bio {
            font-size: clamp(0.9rem, 2vw, 1.1rem);
            color: rgba(255, 255, 255, 0.884);
            max-width: 900px;
            line-height: 1.8;
            margin: 0 auto;
        }

        .timeline-wrapper {
            position: relative;
            padding-left: 80px;
        }

        .timeline-line {
            position: absolute;
            left: 30px;
            top: 0;
            bottom: 0;
            width: 3px;
            background: rgba(255, 255, 255, 0.1);
            z-index: 1;
        }

        .timeline-progress {
            position: absolute;
            left: 30px;
            top: 0;
            width: 3px;
            background: linear-gradient(to bottom, #2e0202, #800404, #990909, #990909, #990909, #990909, white);
            box-shadow: 0 0 15px #990909;
            z-index: 2;
            height: 0%;
            transition: height 0.1s ease-out;
        }

        .thought-entry:hover~.timeline-line {
            background: linear-gradient(to bottom, transparent 0%, var(--secondary-color) 10%, var(--accent-color) 50%, var(--secondary-color) 90%, transparent 100%);
        }

        .thoughts-feed {
            position: relative;
            z-index: 2;
        }

        .thought-entry {
            position: relative;
            margin-bottom: 50px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards;
            cursor: pointer;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .timeline-container {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            top: 10px;
        }

        .timeline-dot {
            transform: rotate(45deg);
            width: 14px;
            height: 14px;
            background: rgb(248, 246, 246);
            border: 2px solid red;
            z-index: 3;
            transition: var(--transition);
        }

        .timeline-dot::after {
            content: '';
            position: absolute;
            inset: 3px;
            background: red;
            opacity: 0.2;
            border-radius: 100%;
            transition: var(--transition);
        }

        .thought-entry:hover .timeline-dot {
            transform: rotate(135deg) scale(1.3);
            border-color: rgb(167, 0, 0);
            box-shadow: 0 0 0 4px rgba(192, 187, 183, 0.1), 0 0 0 8px rgba(139, 90, 43, 0.05);
        }

        .thought-entry:hover .timeline-dot::after {
            opacity: 0.8;
            background: var(--accent-color);
        }

        .timeline-hit-area {
            position: absolute;
            left: 20px;
            top: 0;
            width: 40px;
            height: 100%;
            z-index: 4;
            cursor: pointer;
        }

        .thought-content {
            position: relative;
            background: linear-gradient(160deg, #1a1a1a 0%, #0a0a0a 100%);
            color: #e0e0e0;
            border: 1px solid #4a453e;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
            font-family: 'Inter', -apple-system, sans-serif;
            line-height: 1.6;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .thought-content::before {
            content: '';
            position: absolute;
            left: -9px;
            top: 30px;
            width: 16px;
            height: 16px;
            background: #1a1a1a; 
            border-left: 1px solid #4a453e;
            border-bottom: 1px solid #4a453e;
            transform: rotate(45deg);
            border-bottom-left-radius: 4px;
            z-index: 1;
        }

        .thought-content:hover {
            border-color: #ac0202;
            transform: translateX(4px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
        }

        .thought-date {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 25px;
            padding: 9px 15px;
            background: linear-gradient(135deg, rgba(153, 9, 9, 0.911), rgba(90, 2, 2, 0.747));
            border-radius: 20px;
            font-size: 0.85rem;
            color: rgb(236, 236, 236);
            font-weight: 600;
            transition: var(--transition);
        }

        .thought-text {
            font-size: clamp(1rem, 2vw, 1.2rem);
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.884);
            margin-bottom: 20px;
            padding-left: 20px;
            margin-top: 10px;
            position: relative;
        }

        .thought-text::before {
            content: '"';
            position: absolute;
            left: 0;
            top: -15px;
            font-size: 3rem;
            color: var(--secondary-color);
            opacity: 0.3;
            font-family: Georgia, serif;
            line-height: 1;
        }

        .new-indicator {
            position: absolute;
            right: -10px;
            top: 10px;
            background: linear-gradient(135deg, rgb(153, 9, 9), rgba(90, 2, 2, 0.89));
            color: white;
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 800;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(139, 90, 43, 0.3);
            z-index: 4;
        }

        @media (max-width: 992px) {
            .timeline-wrapper { padding-left: 70px; }
            .timeline-line { left: 35px; }
            .timeline-dot { left: 32px; }
            .timeline-hit-area { left: 15px; width: 35px; }
        }

        @media (max-width: 768px) { 
            .timeline-wrapper { padding-left: 50px; }
            .timeline-line { left: 25px; }
            .timeline-dot { left: 22px; width: 12px; height: 12px; }
            .timeline-hit-area { left: 10px; width: 30px; }
            .thought-content { margin-left: 15px; padding: 20px; }
            #main-nav { padding: 12px 20px; width: 95%; }
            .nav-brand { font-size: 1.2rem; }
            .btn-nav span { display: none; }
            .btn-nav { padding: 10px; }
        }

        #main-nav { background: rgba(10, 10, 10, 0.8); }
     .no-thoughts {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 300px;
    padding: 60px;
    font-family: -apple-system, "Inter", "Segoe UI", sans-serif;
    text-align: center;
    
    /* Glassmorphism: Needs a dark or colorful background behind it */
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px); /* Safari support */
    border-radius: 32px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
}

.status-dot {
    display: inline-block; /* Ensures it sits nicely next to text */
    width: 0.75em;
    height: 0.75em;
    background-color: #b60202; 
    border-radius: 50%;
    
    /* Use margin-bottom sparingly; layout is usually better 
       handled by the parent container's gap or padding */
    margin-bottom: 2rem; 
    
    /* Position relative is fine, but only keep it if 
       you have absolute children inside the dot */
    position: relative;
}

/* Smoother Pulse Ring */
.status-dot::after {
    content: "";
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    border-radius: 50%;
    background: inherit;
    animation: pulse 2.5s cubic-bezier(0.24, 0, 0.38, 1) infinite;
    z-index: -1;
}

.main-text {
    font-size: clamp(1.25rem, 5vw, 1.75rem);
    font-weight: 500;
    color: #ffffff; /* Works best on dark backgrounds */
    letter-spacing: -0.02em;
    margin: 0;
    animation: fadeIn 1.2s ease-out forwards;
}

.sub-text {
    font-size: 0.95rem;
    color: #94a3b8;
    margin-top: 16px;
    font-weight: 400;
    opacity: 0; /* Starts hidden for the animation */
    animation: fadeIn 1.2s ease-out 0.4s forwards; /* Delayed reveal */
}

/* Keyframes Refined */
@keyframes pulse {
    0% { transform: scale(1); opacity: 0.6; }
    100% { transform: scale(4); opacity: 0; }
}

@keyframes fadeIn {
    from { 
        opacity: 0; 
        transform: translateY(15px); 
        filter: blur(8px); 
    }
    to { 
        opacity: 1; 
        transform: translateY(0); 
        filter: blur(0); 
    }
}
    </style>
</head>

<body>
    <!-- Hidden JSON-LD for Search Engines -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Blog",
      "name": "ECHOTONGUE Author's Corner",
      "author": {
        "@type": "Person",
        "name": "Hermona Zeleke"
      },
      "description": "Reflections and insights from the author of ECHOTONGUE.",
      "url": "https://echotongue.com/blog.php"
    }
    </script>

    <!-- Navigation -->
    <nav id="main-nav">
        <a href="index.php" class="cinzel">ECHOTONGUE</a>
        <ul class="nav-links" id="nav-links">
            <li><a href="index.php">Home</a></li>
            <li class="has-dropdown">
                <a href="javascript:void(0)" aria-haspopup="true">About <i class="fas fa-chevron-down" style="font-size: 0.9rem; "></i></a>
                <div class="dropdown">
                    <a href="index.php#about">About the book</a>
                    <a href="index.php#world">What’s inside?</a>
                    <a href="index.php#universe">The universe</a>
                    <a href="index.php#preview">Edition features</a>
                    <a href="index.php#magic">Dialects</a>
                    <a href="index.php#characters"> Main Characters</a>
                </div>
            </li>
            <li><a href="index.php#author">Author</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="Timeline.html">Timeline</a></li>
            <li><a href="chaptermap.html">Chapter Map</a></li>
        </ul>
        <div class="nav-actions">
            <a href="purchasebook.php" class="btn-nav">
                <i class="fas fa-book-open"></i> &nbsp;&nbsp; <span> Purchase Book</span>
            </a>
            <button class="mobile-menu-btn" id="mobile-menu-btn" aria-label="Open Navigation Menu">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- Mobile Navigation -->
    <div class="mobile-nav" id="mobile-nav" style="margin-top: 50px; float: right;">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php#about">About the book</a></li>
            <li><a href="index.php#author">Author</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="Timeline.html">Timeline</a></li>
            <li><a href="chaptermap.html">Chapter Map</a></li>
            <br>
            <li><a href="purchasebook.php" class="btn-nav" style="color: white; font-size: large;"> <i class="fas fa-book-open"></i> Purchase Book</a></li>
        </ul>
    </div>

    <!-- Scroll to Top Button -->
    <button class="scroll-top" id="scroll-top" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </button>
        <!-- Custom Cursor Elements -->
    <div class="cursor-dot"></div>
    <div class="cursor-outline"></div>

    <!-- Author's Thoughts Feed -->
    <div class="authors-thoughts">
        <div class="thoughts-container">
            <div class="thoughts-header">
                <h1 class="author-name">Author's Corner</h1>
                <div class="liner"></div><br>
                <p class="author-bio">
                    Sharing glimpses from the writing desk, moments of inspiration, and reflections on the creative
                    journey. <br>
                    Each thought is a snapshot from the quiet hours where stories are born.
                </p>
            </div>

            <div class="timeline-wrapper">
                <div class="timeline-line"></div>
                <div class="timeline-progress" id="timelineProgress"></div>
                
                <div class="thoughts-feed" id="thoughtsFeed">
                    <?php 
                    include 'db.php'; 
                    $sql = "SELECT * FROM authors_thoughts ORDER BY thought_date DESC";
                    $result = $conn->query($sql);

                    if ($result && $result->num_rows > 0) {
                        $index = 0;
                        while ($row = $result->fetch_assoc()) {
                            $thought_date = htmlspecialchars($row['thought_date'], ENT_QUOTES, 'UTF-8');
                            $thought_text = htmlspecialchars($row['thought_text'], ENT_QUOTES, 'UTF-8'); 
                            $formatted_date = date('F j, Y g:i A', strtotime($thought_date)); 
                            $is_new = ($index == 0);
                            
                            echo '<div class="thought-entry" style="animation-delay: '.($index * 0.15).'s;" data-index="'.$index.'">';
                            if ($is_new) { echo '<span class="new-indicator">Latest</span>'; }
                            echo '<div class="timeline-hit-area"></div>';
                            echo '<div class="timeline-container"><div class="timeline-dot"></div></div>';
                            echo '<div class="thought-content">';
                            echo '<div class="thought-date"><i class="far fa-clock"></i> '.$formatted_date.'</div>';
                            echo '<p class="thought-text">'.$thought_text.'</p>';
                            echo '</div>';
                            echo '</div>';
                            $index++;
                        }
                    } else {
                       echo '<div class="no-thoughts">
        <span class="status-dot"></span>
        <p class="main-text">The feed is currently quiet.</p>
        <p class="sub-text">New updates will appear here automatically.</p>
      </div>';}
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="footer-container">
                <div class="footer-col">
                    <h3>Echotongue</h3>
                    <p style="color: #aaa;">The epic space fantasy novel by Hermona Zeleke. Journey across thirty-two
                        planets in a universe where language is power and ancient secrets await discovery.</p>
                </div>
                <div class="footer-col">
                    <h3>Explore</h3>
                    <ul class="footer-links">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#about">About the book </a></li> 
                        <li><a href="Timeline.html">Timeline</a></li>
                        <li><a href="chaptermap.html">Chapter Map</a></li>
                        <li><a href="purchasebook.php">Buy book</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Connect</h3>
                    <ul class="footer-links">
                        <li><a href="https://t.me/+447949325039" target="_blank" rel="noopener">Telegram</a></li>
                        <li><a href="https://www.instagram.com/echotongue2013/" target="_blank" rel="noopener">Instagram</a></li>
                        <li><a href="https://wa.me/+447949325039" target="_blank" rel="noopener">Whatsapp</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Copyright</h3>
                    <ul class="footer-links"> 
                       <li> <div style="margin-top: 10px; font-size: 0.8rem;"> <strong>ISBN(PB):</strong> 979-8-89604-275-4 </div> </li>
                       <li> <div style="margin-top: 10px; font-size: 0.8rem;"> <strong>ISBN(HB):</strong> 979-8-89604-276-1 </div> </li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p> ECHOTONGUE: The Zureyan Tablets is a work of fiction. All rights reserved. &copy; 2025 Hermona Zeleke.</p>
                <p> Designed by <a style="font-family: 'Cinzel Decorative', serif; font-weight: 800;text-decoration: none; color:#d1cece; cursor: pointer;" href="https://yonikass.netlify.app/" target="_blank" rel="noopener">Yonatan Kassahun</a></p>
            </div>
        </div>
    </footer>

    <script>
    function updateTimelineHeight() {
        const timeline = document.getElementById('timelineLine');
        const feed = document.getElementById('thoughtsFeed');
        if (timeline && feed) {
            const feedHeight = feed.offsetHeight;
            timeline.style.height = `${feedHeight + 50}px`;
        }
    }

    function updateTimelineProgress() {
        const timelineProgress = document.getElementById('timelineProgress');
        const thoughtsFeed = document.getElementById('thoughtsFeed');
        if (timelineProgress && thoughtsFeed) {
            const feedRect = thoughtsFeed.getBoundingClientRect();
            const feedTop = feedRect.top;
            const feedHeight = feedRect.height;
            let progress = 0;
            if (feedTop < 0) {
                progress = Math.min(100, (-feedTop / feedHeight) * 100);
            }
            timelineProgress.style.height = `${progress}%`;
        }
    }

    function attachThoughtEvents() {
        const thoughtEntries = document.querySelectorAll('.thought-entry');
        const timelineLine = document.querySelector('.timeline-line');
        
        thoughtEntries.forEach(thoughtElement => {
            const hitArea = thoughtElement.querySelector('.timeline-hit-area');
            const dot = thoughtElement.querySelector('.timeline-dot');
            const content = thoughtElement.querySelector('.thought-content');
            const newIndicator = thoughtElement.querySelector('.new-indicator');

            if (hitArea && timelineLine) {
                hitArea.addEventListener('mouseenter', function () {
                    const rect = thoughtElement.getBoundingClientRect();
                    const timelineRect = timelineLine.getBoundingClientRect();
                    const position = ((rect.top - timelineRect.top) / timelineRect.height) * 100;
                    timelineLine.style.background = `linear-gradient(to bottom, transparent 0%, var(--secondary-color) ${Math.max(0, position - 5)}%, var(--accent-color) ${position}%, var(--secondary-color) ${Math.min(100, position + 5)}%, transparent 100%)`;
                });
                hitArea.addEventListener('mouseleave', function () {
                    setTimeout(() => { timelineLine.style.background = 'rgba(255, 255, 255, 0.1)'; }, 100);
                });
            }

            thoughtElement.addEventListener('click', function (e) {
                if (!e.target.closest('a')) {
                    if (content) {
                        content.style.transform = 'scale(0.98)';
                        setTimeout(() => { content.style.transform = ''; }, 200);
                    }
                    if (newIndicator) {
                        newIndicator.style.opacity = '0.5';
                        newIndicator.textContent = 'READ';
                        setTimeout(() => { newIndicator.style.display = 'none'; }, 1000);
                    }
                    if (dot) {
                        dot.style.boxShadow = '0 0 0 8px rgba(139, 90, 43, 0.3)';
                        setTimeout(() => { dot.style.boxShadow = ''; }, 500);
                    }
                }
            });
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        updateTimelineHeight();
        updateTimelineProgress();
        attachThoughtEvents();
        const timelineLine = document.querySelector('.timeline-line');
        if (timelineLine) {
            timelineLine.style.opacity = '0';
            setTimeout(() => {
                timelineLine.style.transition = 'opacity 0.8s ease, height 0.3s ease';
                timelineLine.style.opacity = '1';
            }, 300);
        }
    });

    window.addEventListener('resize', updateTimelineHeight);
    window.addEventListener('scroll', updateTimelineProgress);
    setTimeout(updateTimelineHeight, 500);
    </script>
    <script src="assets/js/script.js"></script>
</body> 
</html>