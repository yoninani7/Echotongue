<?php
session_start();

// Generate CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Clear form data after displaying (to prevent showing old data on refresh)
$form_name = isset($_SESSION['form_data']['name']) ? htmlspecialchars($_SESSION['form_data']['name']) : '';
$form_email = isset($_SESSION['form_data']['email']) ? htmlspecialchars($_SESSION['form_data']['email']) : '';
$form_message = isset($_SESSION['form_data']['message']) ? htmlspecialchars($_SESSION['form_data']['message']) : '';
$form_rating = isset($_SESSION['form_data']['rating']) ? $_SESSION['form_data']['rating'] : '0';

// Store feedback messages before clearing
$feedback_success = isset($_SESSION['feedback_success']) ? $_SESSION['feedback_success'] : null;
$feedback_errors = isset($_SESSION['feedback_errors']) ? $_SESSION['feedback_errors'] : null;

// Clear session data after storing
unset($_SESSION['form_data'], $_SESSION['feedback_success'], $_SESSION['feedback_errors']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SEO PRIMARY TAGS -->
    <title>Buy ECHOTONGUE: The Zureyan Tablets | Purchase by Hermona N. Zeleke</title>
    <meta name="description" content="Get your copy of ECHOTONGUE: The Zureyan Tablets. Available now on Amazon, Walmart, Waterstones, Everand, and Dick Smith. Discover the epic space fantasy novel today.">
    <meta name="keywords" content="Buy Echotongue, Hermona Zeleke Book, Purchase Zureyan Tablets, Science Fiction Novel, Amazon Books, Walmart Books, Space Fantasy Purchase">
    <link rel="canonical" href="https://echotongue.com/purchasebook.php" />

    <!-- OPEN GRAPH / FACEBOOK (SOCIAL SEO) -->
    <meta property="og:type" content="book">
    <meta property="og:url" content="https://echotongue.com/purchasebook.php">
    <meta property="og:title" content="Purchase ECHOTONGUE: The Zureyan Tablets">
    <meta property="og:description" content="Don't miss the epic journey. Secure your edition of ECHOTONGUE from your favorite global retailers.">
    <meta property="og:image" content="https://echotongue.com/assets/front.png">

    <!-- TWITTER SEO -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Buy ECHOTONGUE by Hermona N. Zeleke">
    <meta name="twitter:description" content="Now available globally on Amazon, Walmart, and Waterstones.">
    <meta name="twitter:image" content="https://echotongue.com/assets/front.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="assets/echologo.png" sizes="32x32" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/echologo.png">
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

    <!-- SCHEMA.ORG STRUCTURED DATA (HEAVY SEO BOOST) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Product",
      "name": "ECHOTONGUE: The Zureyan Tablets",
      "image": "https://echotongue.com/assets/front.png",
      "description": "An epic space fantasy novel where language is power and ancient secrets await discovery.",
      "brand": {
        "@type": "Brand",
        "name": "ECHOTONGUE"
      },
      "sku": "9798896042754",
      "offers": {
        "@type": "AggregateOffer",
        "url": "https://echotongue.com/purchasebook.php",
        "priceCurrency": "USD",
        "availability": "https://schema.org/InStock",
        "offerCount": "5"
      }
    }
    </script>
    <style>
        :root {
            --red: #ff0000;
            --gold: #ffcc00;
            --gold-glow: rgba(255, 204, 0, 0.3);
            --void: #020202;
            --f-title: 'Cinzel', serif;
            --f-ui: 'Orbitron', sans-serif;
            --ease: cubic-bezier(0.16, 1, 0.3, 1);
        }

        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: var(--void);
            color: #fff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        html {
            scroll-behavior: smooth;
        }

        /* --- MAIN CONTENT --- */
        main {
            flex: 1;
            display: flex;
            width: 100%;
            gap: 1.5vw;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            display: flex;
            width: 100%;
            max-width: 1400px;
            height: auto;
            gap: 2vw;
            align-items: stretch;
        }

        /* --- THE RIFTS --- */
        .rift {
            flex: 1;
            position: relative;
            text-decoration: none;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-top: 1px solid rgba(255, 255, 255, 0.03);
            border-left: 1px solid rgba(255, 255, 255, 0.03);
            border-right: 1px solid rgba(255, 255, 255, 0.03);
            background: linear-gradient(to bottom, rgb(90, 1, 1), #000);
            transition: all 1.8s var(--ease);
            padding: 2rem;
            height: 400px;

        }

        .rift:hover {
            flex: 1.5;
            background: rgba(255, 255, 255, 0.03);
        }

        /* Hover Line Glow */
        .rift::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0%;
            width: 1px;
            height: 0%;
            background: linear-gradient(to bottom, transparent, white, transparent);
            transition: height 0.6s var(--ease);
        }

        .rift:hover::before {
            height: 100%;
        }

        /* --- CONTENT STYLING --- */
        .label {
            font-family: var(--f-ui);
            font-size: 0.7rem;
            letter-spacing: 3px;
            color: #666;
            text-transform: uppercase;
            margin-bottom: 1.5rem;
            transition: color 0.4s;
            text-align: center;
        }

        .rift:hover .label {
            color: #aaa;
        }

        .title {
            font-family: var(--f-title);
            font-size: 2.5vw;
            color: rgba(255, 255, 255, 0.781);
            text-transform: uppercase;
            transition: all 0.6s var(--ease);
            text-align: center;
            margin-bottom: 2rem;
            font-weight: 400;
        }

        .rift:hover .title {
            color: #fff;
            letter-spacing: 2px;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
        }



        /* Buy Button - Minimalist Luxury */
        .buy-btn {
            padding: 0.8rem 2rem;
            font-family: var(--f-ui);
            font-size: 0.7rem;
            letter-spacing: 2px;
            color: #fff;
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.2);
            text-transform: uppercase;
            cursor: pointer;
            opacity: 0.7;
            transform: translateY(10px);
            transition: all 0.4s var(--ease);
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .rift:hover .buy-btn {
            opacity: 1;
            transform: translateY(0);
        }

        .buy-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.4);
        }





        /* --- RESPONSIVE DESIGN --- */
        @media (max-width: 1024px) {
            .container {
                height: auto;
                min-height: calc(100vh - 8rem);
            }

            .title {
                font-size: 3vw;
            }


        }

        @media (max-width: 768px) {
            #main-nav {
                padding: 1rem;
            }

            .nav-links {
                display: none;
            }

            .btn-nav {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
                background: transparent;
                border: none;
                color: #fff;
                font-size: 1.5rem;
                cursor: pointer;
            }

            main {
                padding: 5rem 1rem 1rem;
            }

            .container {
                flex-direction: column;
                gap: 1.5rem;
                height: auto;
            }

            .rift {
                width: 100%;
                min-height: 300px;
                padding: 1.5rem;
            }

            .title {
                font-size: 1.8rem;
            }



            .buy-btn {
                padding: 0.6rem 1.5rem;
                font-size: 0.6rem;
            }


        }

        @media (max-width: 480px) {
            .title {
                font-size: 1.5rem;
            }



            .label {
                font-size: 0.6rem;
                letter-spacing: 2px;
            }
        }

        #main-nav {
            background-color: rgba(5, 5, 5, 0.95);
            padding-bottom: 0px;
            padding-top: 0px;
        }

        /* Container Layout */
        .h_gallery_layout {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 50px;
            /* Deep dark gradient for a premium feel */
            background: linear-gradient(145deg, #1a1a1a, #070707);
            border-radius: 20px;
            margin: 40px auto;
            padding: 60px 50px;
            max-width: 1200px;
            border: 1px solid #333;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5);
            text-decoration: none;
            transition: all 0.4s ease;
            overflow: hidden;
        }

        .h_gallery_layout:hover {
            border-color: #555;
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.7);
        }

        /* Image Section */
        .h_visual_side {
            flex: 0 0 auto;
            background-color: rgba(235, 234, 234, 0.904);
            padding: 10px;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }

        .h_book_img {
            max-width: 200px;
            height: auto;
            border-radius: 4px 10px 10px 4px;
            /* Dramatic red glow to match the cover */
            box-shadow:
                0 0 20px rgba(161, 10, 10, 0.2),
                15px 20px 40px rgba(0, 0, 0, 0.6);
            transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .h_gallery_layout:hover .h_book_img {
            transform: scale(1.05) rotate(-2deg);
            box-shadow: 0 0 40px rgba(161, 10, 10, 0.4);
        }

        /* Text Content */
        .h_text_side {
            flex: 1;
            text-align: left;
        }

        .h_meta_tags {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .h_tag {
            font-family: 'Inter', sans-serif;
            font-size: 0.65rem;
            font-weight: 700;
            padding: 5px 12px;
            background: #252525;
            color: #999;
            border-radius: 4px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .h_tag.highlight {
            background: rgba(161, 10, 10, 0.2);
            color: #ff4d4d;
            border: 1px solid rgba(161, 10, 10, 0.3);
        }

        .h_main_title {
            font-family: 'Cinzel Decorative', serif;
            font-size: 2.8rem;
            font-weight: 900;
            margin: 0;
            /* Metallic silver/white look */
            background: linear-gradient(to bottom, #ffffff, #b3b3b3);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: 2px;
            line-height: 1.1;
        }

        .h_sub_heading {
            font-family: 'Inter', sans-serif;
            font-size: 0.85rem;
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: #777;
            margin: 10px 0 20px 0;
        }

        .h_accent_line {
            width: 50px;
            height: 2px;
            background: #c5a47e;
            /* Gold accent stays as it looks great on dark */
            margin-bottom: 25px;
        }

        .h_body_text {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.95rem;
            line-height: 1.8;
            color: #bbb;
            margin-bottom: 35px;
        }

        .h_warning_label {
            color: #d60404;
            letter-spacing: 3px;
            font-weight: 800;
            font-size: 17px;
            font-family: 'Cinzel', serif;
            text-transform: uppercase;
            margin-right: 5px;
        }

        /* Action Button */
        .h_buy_btn {
            padding: 9px 14px;
            background: radial-gradient(100% 120% at 50% 0%, #df0211 0%, #500D11 100%);
            color: #fdfdfd;
            border-radius: 100px;
            border: none;
            font-family: 'Cinzel', serif;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 0.7px;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            text-decoration: none;
            text-align: center;
            display: inline-flex;
            align-items: center;
        }

        .h_buy_btn:hover {
            background: #960303;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(161, 10, 10, 0.4);
            transition: all 0.2s ease-in-out;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .h_gallery_layout {
                flex-direction: column;
                text-align: center;
                padding: 40px 20px;
                margin: 15px;
            }

            .h_text_side {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .h_main_title {
                font-size: 2.2rem;
            }
        } 
/* Notification Styles */ 
.custom-notification {
    position: fixed;
    top: 30px;
    right: 30px;
    padding: 20px 25px;
    display: flex;
    align-items: center;
    gap: 15px;
    z-index: 1000;
    max-width: 420px;
    font-family: var(--f-ui); /* Orbitron */
    font-size: 0.8rem;
    letter-spacing: 1px;
    text-transform: uppercase;
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    background: rgba(5, 5, 5, 0.9);
    border: 1px solid rgba(255, 255, 255, 0.1);
    color: #fff;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6);
    transition: all 0.5s var(--ease);
}

.custom-notification.success {
    border-left: 4px solid #28a745;
    box-shadow: 0 0 20px rgba(255, 204, 0, 0.15), 0 20px 40px rgba(0, 0, 0, 0.6);
}

.custom-notification.error {
    border-left: 4px solid var(--red);
    box-shadow: 0 0 20px rgba(255, 0, 0, 0.15), 0 20px 40px rgba(0, 0, 0, 0.6);
}

.custom-notification i {
    font-size: 1.2rem;
}

.custom-notification.success i { color:#28a745; }
.custom-notification.error i { color: var(--red); }

.close-notification {
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
    padding: 0;
    margin-left: 15px;
    color: rgba(255,255,255,0.3);
    transition: color 0.3s;
}

.close-notification:hover {
    color: #fff;
}

@keyframes slideIn {
    from { transform: translateX(120%); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
}

@keyframes slideOut {
    from { transform: translateX(0); opacity: 1; }
    to { transform: translateX(120%); opacity: 0; }
}
    </style>
</head>

<body>

    <!-- Fixed TRANSPARENT Navigation Bar -->
    <nav id="main-nav">
        <a href="index.php" class="cinzel">ECHOTONGUE</a>
        <ul class="nav-links" id="nav-links">
            <li><a href="index.php">Home</a></li>
            <li class="has-dropdown">
                <a href="javascript:void(0)">About <i class="fas fa-chevron-down" style="font-size: 0.9rem; "></i></a>
                <div class="dropdown">
                    <a href="index.php #about">About the book</a>
                    <a href="index.php #world">What's inside?</a>
                    <a href="index.php #universe">The universe</a>
                    <a href="index.php #preview">Edition features</a>
                    <a href="index.php #magic">Dialects</a>
                    <a href="index.php #characters"> Main Characters</a>
                </div>
            </li>
            <li><a href="index.php #author">Author</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="Timeline.html">Timeline</a></li>
            <li><a href="chaptermap.html">Chapter Map</a></li>
        </ul>
        <div class="nav-actions">
            <a href="purchasebook.php" class="btn-nav">
                <i class="fas fa-book-open"></i> &nbsp;&nbsp; <span> Purchase Book</span>
            </a>
            <button class="mobile-menu-btn" id="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>
    <!-- Mobile Navigation - Hidden by default -->
    <div class="mobile-nav" id="mobile-nav" style="margin-top: 50px; float: right;">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php #about">About the book</a></li>
            <li><a href="index.php #author">Author</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="Timeline.html">Timeline</a></li>
            <li><a href="chaptermap.html">Chapter Map</a></li>
            <br>
            <li><a href="purchasebook.php" class="btn-nav" style="color: white; font-size: large;"> <i class="fas fa-book-open"></i>
                    Purchase Book</a></li>
        </ul>
    </div>
    <!-- Scroll to Top Button -->
    <button class="scroll-top" id="scroll-top">
        <i class="fas fa-chevron-up"></i>
    </button>
    <!-- Custom Cursor Elements -->
    <div class="cursor-dot"></div>
    <div class="cursor-outline"></div>


    <a href="#stores" class="h_gallery_layout">
        <div class="h_visual_side">
            <div class="h_image_frame">
                <img src="assets/front.png" alt="ECHOTONGUE" class="h_book_img">
            </div>
        </div>

        <div class="h_text_side">
            <div class="h_meta_tags">
                <span class="h_tag highlight">Science Fiction</span>
                <span class="h_tag">Now Available</span>
            </div>

            <h2 class="h_main_title">ECHOTONGUE</h2>
            <h3 class="h_sub_heading">By Hermona N. Zeleke</h3>

            <div class="h_accent_line"></div>

            <p class="h_body_text">
                <span class="h_warning_label">Warning:</span>
                This book has been known to cause 'one more chapter' syndrome.
                It may lead to the sudden ghosting of friends and responsibilities.
                If you're hiding just to finish a scene, don't worry — the plot is much
                more interesting than whatever you were supposed to be doing anyway.
            </p>

            <button class="h_buy_btn">
                <i class="fas fa-shopping-cart"></i> &nbsp; BUY BOOK NOW
            </button>
        </div>
    </a>
    <a href="#stores" style="text-decoration: none;">
        <h3 class="section-title" id="stores" style="margin-top: 20px; font-size: 1.8rem;">Now available on &nbsp;&nbsp;
            <i class="fas fa-arrow-down"></i>
        </h3>
    </a>
    <div class="container">
        <a href="https://www.amazon.co.uk/dp/B0FQXX1F9B/ref" target="_blank" class="rift">
            <img src="assets/amazon.png" style="width: 200px;">
            <span class="label">Global delivery</span>
            <div class="buy-btn">Buy book on Amazon </div>
        </a>
        <a href="https://www.walmart.com/ip/Echotongue-The-Zureyan-Tablets-Paperback-9798896042938/18356422505?classType=REGULAR"
            target="_blank" class="rift">
            <img src="assets/walmart.png" style="width: 200px;">
            <span class="label">UK/ International</span>
            <div class="buy-btn">Buy book on Walmart </div>
        </a>
        <a href="https://www.waterstones.com/author/hermona-n-zeleke/10239986" target="_blank" class="rift">
            <img src="assets/waterstones.png" style="width: 200px;">
            <span class="label">UK/ International</span>
            <div class="buy-btn">Buy book on Waterstones </div>
        </a>
    </div>

    <div class="container" style="margin-top: 30px;">
        <a href="https://www.everand.com/book/925094085/Echotongue-The-Zureyan-Tablets" target="_blank" class="rift">
            <img src="assets/everand.png" style="width: 200px;">
            <span class="label">Global delivery</span>
            <div class="buy-btn">Buy book on Everand </div>
        </a>

        <a href="https://www.dicksmith.com.au/da/buy/the-nile-echotongue-9798896042938/?ssid=201.7c4666db-7427-4926-b0ed-fc585b6c4ae0&click_id=7KDNCdhNDvAHBfpwQ6wBtAnJpLPdo9tYElb27focHwbzTRpBs6rfE0uO8RbIjnAAyBSEvfR46ZU-gV2tuWS-VlnB1HABrwO9nA1h3oNYVMPsp_ZfLGg5UMjQbqzi_rAKoGk9SaoxrkmnKLOxKc1QLY2ASRqhcNrhDp6qZmvBZzDlQD_QNBhPAkujMKTFoOPsrMJwOndh3TTxkI6wnB3cu6qTp_vVKRHGqDdPtsDFlCIMZ2biyHcWNFsQIsxoZPjbeWXNa3ehe437-GsCwO-DMx2vaK89K7Fb4_cctGse7OqUCwIPdjNOfjoAMcvbZYoA2ZeMBruO1KcRxoVEe0LTQnjIX60qGPlPYrAwIH9AzXDLcEVrB9Jw752vnHHbf33Rpqp58VYDV3zLrdK6c4XRpg227c1kvPupDEopljp6imcX2HLw7HCkNPmg2BWVxbAOtk9O_hAIO-E-5iLF0dxhWQT05eCqS1I1XnjL6tFLzJKf6MWKpvdfcEc24hVh-q_XlgeoU8HuQek8k40GJhKUOuEYeLUXeYU2HT1vSI_-aNOFIVdtiuaJl_8Ti8iMVQ5a53dIN5iEyzrer8NKgLSvGviPk7VF5ruwEqVPfPXoMIBfuM424KnEDTh9zA%3D%3D"
            target="_blank" class="rift">
            <img src="assets/dicksmith.png" style="width: 200px;">
            <span class="label">UK/ International</span>
            <div class="buy-btn">Buy book on dick smith </div>
        </a>
        <a href="#" target="_blank" class="rift">
            <img src="" alt="">
            <span class="label">Direct Origin</span>
            <h2 class="title">Partner <br> bookstores</h2>
            <div class="buy-btn">Visit book store </div>
        </a>
    </div>
    </div>
    <section>
        <!-- Review Section -->
        <div class="r_review-section">
            <div class="r_container">
                <!-- Content -->
                <div class="r_review-content">
                    <!-- Left: Reviews Display -->
                    <div class="r_reviews-display">
                        <div class="r_display-header">
                            <h2 class="r_display-title">Words of the Wise</h2>
                            <div class="r_review-count"> Reviews</div>
                        </div>

                        <!-- Review Cards -->
                        <div class="r_review-cards">
                            <!-- Review 1 -->
                            <article class="r_review-card">
                                <div class="r_review-card-content">
                                    <div class="r_review-header">
                                        <div class="r_reviewer-info">
                                            <div class="r_reviewer-avatar">MS</div>
                                            <div class="r_reviewer-details">
                                                <h4>Mr Sami</h4>
                                                <div class="r_review-date">October 23, 2025</div>
                                            </div>
                                        </div>
                                        <div class="r_review-rating">★★★★★</div>
                                    </div>

                                    <p class="r_review-text">
                                        A great book for anyone who loves reading this is an incredible and
                                        inspirational
                                        book. I appreciate those who are the authors, especially very young children.
                                        Thank
                                        you
                                        very much.
                                    </p>

                                    <div class="r_review-meta">
                                        <button class="r_action-btn">
                                            <i class="fas fa-book-open"></i> Format: Paperback
                                        </button>
                                        <div class="r_review-verified" style="float: right;">
                                            <i class="fas fa-check-circle"></i> Verified Purchase
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <!-- Review 2 -->

                            <article class="r_review-card">
                                <div class="r_review-card-content">
                                    <div class="r_review-header">
                                        <div class="r_reviewer-info">
                                            <div class="r_reviewer-avatar">Y</div>
                                            <div class="r_reviewer-details">
                                                <h4>Yodit</h4>
                                                <div class="r_review-date">November 8, 2025</div>
                                            </div>
                                        </div>
                                        <div class="r_review-rating">★★★★★</div>
                                    </div>

                                    <p class="r_review-text">
                                        Echotongue: The Zureyan Tablets is an extraordinary fantasy adventure that
                                        showcases
                                        the creativity and talent of a young author. The book stands out for its
                                        imaginative
                                        world-building, engaging characters, and suspenseful narrative.

                                        What's most impressive is the natural dialogue and smooth pacing, rare qualities
                                        for
                                        such a young writer. This story is not only a great read for children but also
                                        for
                                        adults who appreciate fresh, inventive storytelling. Overall, it's a testament
                                        to
                                        youthful creativity and a highly recommended read for fans of fantasy and
                                        adventure.
                                    </p>

                                    <div class="r_review-meta">
                                        <div class="r_review-actions">
                                            <button class="r_action-btn">
                                                <i class="fas fa-book-open"></i> Format: Hardcover
                                            </button>
                                        </div>
                                        <div class="r_review-verified">
                                            <i class="fas fa-check-circle"></i> Verified Purchase
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <!-- Review 3 -->
                            <article class="r_review-card">
                                <div class="r_review-card-content">
                                    <div class="r_review-header">
                                        <div class="r_reviewer-info">
                                            <div class="r_reviewer-avatar">AC</div>
                                            <div class="r_reviewer-details">
                                                <h4>Amazon Customer</h4>
                                                <div class="r_review-date">November 4, 2025</div>
                                            </div>
                                        </div>
                                        <div class="r_review-rating">★★★★★</div>
                                    </div>

                                    <p class="r_review-text">
                                        I can't believe the eleven years old girl write such an imaginable book. It is
                                        very
                                        interesting and very difficult to stop reading. I can't wait to read the next
                                        book
                                        from her.
                                    </p>

                                    <div class="r_review-meta">
                                        <button class="r_action-btn">
                                            <i class="fas fa-book-open"></i> Format: Kindle Edition
                                        </button>
                                        <div class="r_review-verified" style="float: right;">
                                            <i class="fas fa-check-circle"></i> Verified Reader
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>

                   <!-- Right: Review Form -->
        <div class="r_review-form-container" id="review-form">
            <div class="r_form-header">
                <div class="r_form-icon">
                    <i class="fas fa-pen-nib"></i>
                </div>
                <h2 class="r_form-title">Share Your Thoughts</h2>
                <p class="r_form-subtitle">
                    Your perspective matters. Share your experience with this book - what moved you, what
                    surprised you, what stayed with you.
                </p>
            </div>
 

    <!-- Form -->
    <form action="submit_feedback.php" method="POST" id="feedbackForm">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
        
        <div class="r_form-group">
            <label class="r_form-label" for="r_reviewTitle">Your name <strong style="color: red;">*</strong></label>
            <input type="text" id="r_reviewTitle" name="name" class="r_form-input" 
                   value="<?php echo $form_name; ?>"
                   placeholder="Enter your name" required>
        </div>

        <div class="r_form-group">
            <label class="r_form-label" for="email">Your Email <strong style="color: red;">*</strong></label>
            <input type="email" id="email" name="email" class="r_form-input"
                   value="<?php echo $form_email; ?>"
                   placeholder="Enter your email" required>
        </div>

        <div class="r_form-group">
            <label class="r_form-label" for="r_reviewText">Your Review <strong style="color: red;">*</strong></label>
            <textarea id="r_reviewText" name="message" class="r_form-textarea" style="resize: none;" 
                      placeholder="Share your honest thoughts..." required rows="4"><?php echo $form_message; ?></textarea>
        </div>

        <label class="r_form-label">Your Rating <strong style="color: red;">*</strong></label>
        <div class="r_rating-container">
            <div class="r_star-rating" id="r_starRating">
                <span class="r_star" data-value="5">☆</span>
                <span class="r_star" data-value="4">☆</span>
                <span class="r_star" data-value="3">☆</span>
                <span class="r_star" data-value="2">☆</span>
                <span class="r_star" data-value="1">☆</span>
            </div>
            <input type="hidden" id="r_rating" name="rating" 
                   value="<?php echo $form_rating; ?>" required>
            <div class="r_rating-hint">I am watching you ! <i class="fa-solid fa-face-grin-beam"
                                        style="color: rgba(253, 253, 253, 0.863);"></i></div>
        </div>

        <div class="r_submit-container">
            <button type="submit" class="r_submit-btn" id="r_submitBtn">
                <i class="fas fa-paper-plane"></i>  <span id="btn-text">Submit your Review</span>
            </button>
            <div id="r_loading" style="display: none; margin-top: 10px;">
                <i class="fas fa-spinner fa-spin"></i> Submitting...
            </div>
            <div id="notification-container"></div>
        </div>
    </form>
</div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
      <footer>
            <div class="containear" style=" width: 90%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;">
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
                        <li><a href="https://t.me/+447949325039" target="_blank">Telegram</a></li>
                        <li><a href="https://www.instagram.com/echotongue2013/" target="_blank">Instagram</a></li>
                        <li><a href="https://wa.me/+447949325039" target="_blank" >Whatsapp</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Copyright</h3>
                    <ul class="footer-links"> 
                       <li> <div style="margin-top: 10px; font-size: 0.8rem;"> <strong>ISBN(PB):</strong> 979-8-89604-275-4 </div> </li>
                       <li> <div style="margin-top: 10px; font-size: 0.8rem;"> <strong>ISBN(HB):</strong> 979-8-89604-276-1 </div> </li>
                    </ul>
                  <div> 
            
                </div>
                </div>
            </div>
            <div class="copyright">
                <p> ECHOTONGUE: The Zureyan Tablets is a work of fiction. All rights
                    reserved. &copy; 2025 Hermona Zeleke.</p>
                
                <p> Designed by <a
                        style="font-family: 'Cinzel Decorative', serif; font-weight: 800;text-decoration: none; color:#d1cece; cursor: pointer;margin-bottom: 0 rem;"
                        href="https://yonikass.netlify.app/" target="_blank">Yonatan Kassahun</a></p>
            </div>
        </div>
    </footer>


    <script src="assets/js/script.js"></script>
<script>
    // Initialize star rating
    document.addEventListener('DOMContentLoaded', function () {
        const r_stars = document.querySelectorAll('.r_star');
        const r_ratingInput = document.getElementById('r_rating');
        const form_rating = '<?php echo $form_rating; ?>';

        // Set initial star display based on form data
        if (form_rating > 0) {
            r_stars.forEach(s => {
                const starValue = s.getAttribute('data-value');
                if (starValue <= form_rating) {
                    s.classList.add('selected');
                    s.textContent = '★';
                    s.style.color = '#c91313';
                }
            });
            r_ratingInput.value = form_rating;
        }

        r_stars.forEach(r_star => {
            r_star.addEventListener('click', function () {
                const value = this.getAttribute('data-value');
                r_ratingInput.value = value;

                // Update star display
                r_stars.forEach(s => {
                    const starValue = s.getAttribute('data-value');
                    if (starValue <= value) {
                        s.classList.add('selected');
                        s.textContent = '★';
                        s.style.color = '#c91313';
                    } else {
                        s.classList.remove('selected');
                        s.textContent = '☆';
                        s.style.color = '';
                    }
                });
            });

            // Hover effects
            r_star.addEventListener('mouseover', function () {
                const value = this.getAttribute('data-value');
                r_stars.forEach(s => {
                    const starValue = s.getAttribute('data-value');
                    if (starValue <= value) {
                        s.style.color = '#c91313';
                        s.style.transform = 'scale(1.2)';
                    }
                });
            });

            r_star.addEventListener('mouseout', function () {
                const currentRating = r_ratingInput.value;
                r_stars.forEach(s => {
                    const starValue = s.getAttribute('data-value');
                    s.style.transform = '';
                    if (currentRating === '0' || starValue > currentRating) {
                        if (!s.classList.contains('selected')) {
                            s.style.color = '';
                        }
                    }
                });
            });
        });

        // Form submission with button state management
        const feedbackForm = document.getElementById('feedbackForm');
        if (feedbackForm) {
            feedbackForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const form = this;
                const submitBtn = document.getElementById('r_submitBtn');
                const btnText = document.getElementById('btn-text');
                const originalBtnHTML = submitBtn.innerHTML;
                const originalBtnText = btnText.textContent;
                const originalBtnStyle = submitBtn.style.cssText;
                
                // Step 1: Set to LOADING state
                submitBtn.disabled = true;
                submitBtn.style.opacity = '0.7';
                submitBtn.style.cursor = 'not-allowed';
                submitBtn.style.background = '#6c757d';
                btnText.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
                
                // Create FormData object
                const formData = new FormData(form);
                
                // Submit via fetch API
                fetch(form.action, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Step 2: Set to SUCCESS state
                        submitBtn.style.background = '#28a745';
                        submitBtn.style.borderColor = '#28a745';
                        btnText.innerHTML = 'Review submitted !';
                        
                        // Clear the form
                        form.reset();
                        
                        // Reset stars
                        r_stars.forEach(s => {
                            s.classList.remove('selected');
                            s.textContent = '☆';
                            s.style.color = '';
                        });
                        r_ratingInput.value = '0';
                        
                        // Show success message
                        showNotification('success', data.message);
                        
                        // Step 3: Hide button after 1 second
                        setTimeout(() => {
                            submitBtn.style.opacity = '0';
                            submitBtn.style.transform = 'scale(0.8)';
                            submitBtn.style.transition = 'all 0.5s ease';
                            
                            // Step 4: Reset and show button again after another 5 seconds
                            setTimeout(() => {
                                submitBtn.disabled = false;
                                submitBtn.style.cssText = originalBtnStyle;
                                submitBtn.innerHTML = originalBtnHTML;
                                submitBtn.style.opacity = '1';
                                submitBtn.style.transform = 'scale(1)';
                                submitBtn.style.display = 'inline-flex';
                                submitBtn.style.alignItems = 'center';
                            }, 1000);
                        }, 1000);
                        
                    } else {
                        // Show error message
                        if (data.errors) {
                            showNotification('error', data.errors.join('<br>'));
                        } else {
                            showNotification('error', data.message);
                        }
                        
                        // Reset button
                        submitBtn.disabled = false;
                        submitBtn.style.cssText = originalBtnStyle;
                        submitBtn.innerHTML = originalBtnHTML;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    
                    // Show error message
                    showNotification('error', 'Network error. Please try again.');
                    
                    // Reset button
                    submitBtn.disabled = false;
                    submitBtn.style.cssText = originalBtnStyle;
                    submitBtn.innerHTML = originalBtnHTML;
                });
            });
        }

      function showNotification(type, message) {
    // Remove existing notifications
    const existingNotifications = document.querySelectorAll('.custom-notification');
    existingNotifications.forEach(notif => {
        notif.style.animation = 'slideOut 0.3s ease forwards';
        setTimeout(() => notif.remove(), 300);
    });
    
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `custom-notification ${type}`;
    
    // Set Icon based on type
    const icon = type === 'success' ? 'fa-circle-check' : 'fa-triangle-exclamation';
    
    notification.innerHTML = `
        <i class="fa-solid ${icon}"></i>
        <div class="notification-content">
            <div style="font-weight: 900; margin-bottom: 2px;">${type === 'success' ? 'System Success' : 'System Error'}</div>
            <div style="opacity: 0.8; font-family: 'Montserrat', sans-serif; text-transform: none;">${message}</div>
        </div>
        <button class="close-notification">&times;</button>
    `;
    
    // Set entrance animation
    notification.style.animation = 'slideIn 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards';
    
    // Add close button functionality
    notification.querySelector('.close-notification').onclick = () => {
        notification.style.animation = 'slideOut 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards';
        setTimeout(() => notification.remove(), 400);
    };
    
    // Auto remove after 6 seconds
    setTimeout(() => {
        if (notification.parentNode) {
            notification.style.animation = 'slideOut 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards';
            setTimeout(() => notification.remove(), 400);
        }
    }, 6000);
    
    document.body.appendChild(notification);
}
        // Add subtle scroll animation
        const r_reviewCards = document.querySelectorAll('.r_review-card');
        const r_observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });

        r_reviewCards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            r_observer.observe(card);
        });
    });
</script>
    <script>
        // Simple scroll to top functionality
        const scrollTopBtn = document.getElementById('scroll-top');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                scrollTopBtn.classList.add('visible');
            } else {
                scrollTopBtn.classList.remove('visible');
            }
        });

        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Mobile menu toggle (basic functionality)
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileNav = document.getElementById('mobile-nav');
        const mobileCloseBtn = document.getElementById('mobile-close-btn');

        if (mobileMenuBtn && mobileNav) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileNav.style.display = 'block';
            });

            mobileCloseBtn.addEventListener('click', () => {
                mobileNav.style.display = 'none';
            });
        } 
    </script>

</body>

</html>