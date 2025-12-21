
const planets = [
    { id: 1, name: "Adrestia", type: "Hidden Earth Planet", description: "A 'planet' embedded within Earth itself, home to Galaxians with magical abilities. The main setting where Lydia discovers her powers." },
    { id: 2, name: "Ludor", type: "Council World", description: "Home of the Galaxian Council headquarters. A planet of luxury and political power where Lydia, Alex, and Felix sneak to eavesdrop on secret meetings." },
    { id: 3, name: "Aster", type: "Goldilocks Planet", description: " Japan in the twenty-second century, with bustling city squares, futuristic hotels, and the Glass Sphere museum" },
    { id: 4, name: "Earth (Man)", type: "Mortal World", description: "The only planet without magical tongues. Home to regular humans, though some like Lydia discover they're actually Galaxians." },
    { id: 5, name: "Ingero", type: "Underworld", description: "The banished planet in the Void where evil souls are sent. Home to Ignisos creatures who cannot pass Adrestian borders." },
    { id: 6, name: "Maxima", type: "Giant World", description: "What humans call Jupiter. A massive planet mentioned in Galaxian astronomy." },
    { id: 7, name: "Onus", type: "Red World", description: "Known to humans as Mars. Source of Sand Dust used in spaceship repairs." },
    { id: 8, name: "Santurnatis", type: "Ringed World", description: "The original name for Saturn. Source of Santurnatian gold used in advanced technology." },
    { id: "+", name: "<br> And much more", type: "+++", description: "More planets will unravel as you go deeper into the universe." }
];

const characters = [
    { id: 1, name: "Lydia Nightshade", role: "Protagonist", description: "A thirteen-year-old who discovers she possesses mysterious powers after a school incident. She's brave, resourceful, and on a journey to discover her true identity and origins across the planets.", image: "" },
    { id: 2, name: "Alex Gardener", role: "Companion", description: "A skilled fighter from Adrestia with a rebellious streak. He becomes Lydia's guide to the magical world she's entered, helping her navigate the dangers of interplanetary politics and ancient mysteries.", image: "" },
    { id: 3, name: "Felix Darth", role: "Strategist", description: "The brains of the group, Felix is knowledgeable about Galaxian history, laws, and technology. He's resourceful and often comes up with plans to get the trio out of dangerous situations.", image: "" },
];

const dialects = [
    { name: "Echotongue", power: "The legendary tongue that can challenge the Beyond itself. Used in the Zureyan Tablets." },
    { name: "English (Man Tongue)", power: "The only known tongue without inherent magic, used by humans on Earth." },
    { name: "Zaman", power: "The tongue of Zama, one of the thirty-two planetary languages with magical properties." },
    { name: "Santurna", power: "The tongue of Santurnatis, channeling magical energy through its unique phonetics." },
    { name: "Pegnatongue", power: "The language of Pegasus creatures, understood by few like Minnie Fenn." },
    { name: "Lukotounge", power: "Earth wolf dialect, more emotive and messy compared to Galaxian creature languages." },
    { name: "Tekulatoungue", power: "Ancient African creature language, too powerful for most to handle." },
    { name: "Adrestian Standard", power: "Common tongue of Adrestia, blending elements from multiple planetary languages." }
];

const timelineEvents = [
    { title: "The Explosion", description: "Lydia accidentally destroys her school using unknown magical words, discovering her Galaxian abilities for the first time." },
    { title: "Arrival in Adrestia", description: "Rescued from a Taurconis attack, Lydia crosses the Adrestian border and meets Alex and Felix, learning about the thirty-two planets." },
    { title: "The Council Meeting", description: "The trio sneaks to Ludor to eavesdrop on the Galaxian Council, learning about the rediscovered Zureyan Tablets." },
    { title: "Kidnapped", description: "Lydia, Alex, and Felix are captured by Councillors Xan Cheng and Tobias Ford, but Lydia fights them off using her emerging powers." },
    { title: "Crash on Aster", description: "Their ship is hit by an asteroid, crashing on Aster where they seek repairs and encounter Felix's father, Alzhimer." },
    { title: "The Glass Sphere", description: "The group plans to visit the Glass Sphere museum to learn more about the Zureyan Tablets and Lydia's origins." },
    { title: "Echotongue Revealed", description: "Lydia discovers she can use Echotongue, the legendary language that can challenge the Beyond itself." },
    { title: "The Beyond Speaks", description: "Lydia communicates with the Beyond, the creator of the universe, who reveals she's one of only three beings ever to achieve this." }
];

// DOM Elements
const nav = document.getElementById('main-nav');
const mobileMenuBtn = document.getElementById('mobile-menu-btn');
const mobileNav = document.getElementById('mobile-nav');
const mobileCloseBtn = document.getElementById('mobile-close-btn');
const scrollTopBtn = document.getElementById('scroll-top');
const closemode = document.getElementById('closemode');
const samplemodal = document.getElementById('sample-modal');
const navLinks = document.querySelectorAll('.nav-links a, .mobile-nav a');
const glitchTitle = document.querySelector('.glitch-title');
const orderForm = document.getElementById('order-form');
const newsletterForm = document.getElementById('newsletter-form');
const scrollDownBtn = document.querySelector('.scroll-down');
const openSampleBtn = document.getElementById('open-sample-modal');

// State
let scrollTimeout = null;
let isMobileMenuOpen = false;
let glitchInterval = null;

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function () {
    initializeApp();
});

function initializeApp() {
    renderPlanets();
    renderCharacters();
    renderDialects();
    setupEventListeners();
    setupScrollEffects();
    setupCustomCursor();

    // Initial scroll check
    handleScroll();
}

// Render functions
function renderPlanets() {
    const planetsGrid = document.getElementById('planets-grid');
    if (!planetsGrid) return;

    planetsGrid.innerHTML = planets.map(planet => `
            <div class="planet-card">
                <div class="planet-number">${planet.id}</div>
                <div style="width:20%; height:30px; color:white;"> <hr> </div>
                <h3 class="planet-name">${planet.name}</h3>
                <div class="planet-type">${planet.type}</div>
                <br>
                <p>${planet.description}</p>
            </div>
        `).join('');
}

function renderCharacters() {
    const charactersContainer = document.getElementById('characters-container');
    if (!charactersContainer) return;

    charactersContainer.innerHTML = characters.map(character => `
            <div class="character-card">
                <div class="character-img">
                    <div class="character-role-badge">${character.role}</div> 
                </div>
                <div class="character-info">
                    <h3 class="character-name">${character.name}</h3>
                    <p>${character.description}</p>
                </div>
            </div>
        `).join('');
}

function renderDialects() {
    const dialectsGrid = document.getElementById('dialects-grid');
    if (!dialectsGrid) return;

    dialectsGrid.innerHTML = dialects.map(dialect => `
            <div class="dialect-item">
                <div class="dialect-name">${dialect.name}</div>
                <p>${dialect.power}</p>
            </div>
        `).join('');
}

// Event Listeners Setup
function setupEventListeners() {
    // Mobile menu button - only button toggles the menu
    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', toggleMobileNav);
    }

    // Mobile close button - optional if you want a separate close button
    if (mobileCloseBtn) {
        mobileCloseBtn.addEventListener('click', closeMobileNav);
    }

    // Close mobile menu when clicking on a link
    document.querySelectorAll('.mobile-nav a').forEach(link => {
        link.addEventListener('click', closeMobileNav);
    });

    // Newsletter form submission
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const email = this.querySelector('input').value;
            showNotification(`Thank you for subscribing with ${email}!`);
            this.reset();
        });
    }

    // Order form submission
    if (orderForm) {
        orderForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const name = this.querySelector('#name').value;
            const email = this.querySelector('#email').value;
            showNotification(`Thank you ${name}! Your order inquiry has been received. We will contact you at ${email} within 24 hours.`);
            this.reset();
        });
    }

    // Scroll to top button
    if (scrollTopBtn) {
        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // Smooth scrolling for navigation links
    navLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href.startsWith('#')) {
                e.preventDefault();
                const targetId = href.substring(1);
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    // Scroll to target
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                    // Update active nav link
                    updateActiveNavLink(this);
                }
            }
        });
    });

    // Scroll down button
    if (scrollDownBtn) {
        scrollDownBtn.addEventListener('click', scrollToContent);
    }

    // Sample modal functionality
    if (closemode) {
        closemode.addEventListener('click', () => {
            samplemodal.style.display = 'none';
            document.body.style.overflow = 'auto';
        });
    }

    if (openSampleBtn) {
        openSampleBtn.addEventListener('click', () => {
            samplemodal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        });
    }

    // Close modal when clicking outside
    window.addEventListener('click', function (event) {
        if (event.target === samplemodal) {
            samplemodal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    });

    // Glitch title effect
    if (glitchTitle) {
        const runes = "!@#$%^&*()_+{}:<>?";
        const originalText = glitchTitle.textContent || glitchTitle.innerText;

        glitchTitle.addEventListener('mouseover', () => {
            let iterations = 0;

            clearInterval(glitchInterval);

            glitchInterval = setInterval(() => {
                glitchTitle.innerText = originalText
                    .split("")
                    .map((letter, index) => {
                        if (index < iterations) {
                            return originalText[index];
                        }
                        return runes[Math.floor(Math.random() * runes.length)];
                    })
                    .join("");

                if (iterations >= originalText.length) {
                    clearInterval(glitchInterval);
                }

                iterations += 1 / 3;
            }, 30);
        });
    }

    // Window scroll events
    window.addEventListener('scroll', handleScroll);

    // Close mobile menu on window resize (if needed)
    window.addEventListener('resize', function () {
        if (window.innerWidth > 992 && isMobileMenuOpen) {
            closeMobileNav();
        }
    });
}

// Scroll effects
function setupScrollEffects() {
    // Timeline animation on scroll
    const timelineItems = document.querySelectorAll('.timeline-item');
    if (timelineItems.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.3 });

        timelineItems.forEach(item => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(30px)';
            item.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
            observer.observe(item);
        });
    }
}

// Mobile menu functions
function toggleMobileNav() {
    const menuBtnIcon = mobileMenuBtn.querySelector('i');

    if (!isMobileMenuOpen) {
        mobileNav.classList.add('active');
        document.body.style.overflow = 'hidden';
        menuBtnIcon.classList.remove('fa-bars');
        menuBtnIcon.classList.add('fa-times');
        isMobileMenuOpen = true;
    } else {
        closeMobileNav();
    }
}

function closeMobileNav() {
    const menuBtnIcon = mobileMenuBtn.querySelector('i');

    mobileNav.classList.remove('active');
    document.body.style.overflow = '';
    menuBtnIcon.classList.remove('fa-times');
    menuBtnIcon.classList.add('fa-bars');
    isMobileMenuOpen = false;
}

// Scroll handler
function handleScroll() {
    // Navbar scroll effect
    if (nav) {
        if (window.scrollY > 50) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
    }

    // Scroll to top button
    if (scrollTopBtn) {
        if (window.scrollY > 500) {
            scrollTopBtn.classList.add('visible');
        } else {
            scrollTopBtn.classList.remove('visible');
        }
    }

    // Update active nav link with throttling
    if (!scrollTimeout) {
        scrollTimeout = setTimeout(() => {
            updateActiveNavLink();
            scrollTimeout = null;
        }, 100);
    }
}

// Update active navigation link
function updateActiveNavLink(clickedLink = null) {
    const sections = document.querySelectorAll('section[id], header[id]');
    const scrollPosition = window.scrollY + 100;

    // If a link was clicked, use that
    if (clickedLink) {
        document.querySelectorAll('.nav-links a, .mobile-nav a').forEach(link => {
            link.classList.remove('active');
        });
        clickedLink.classList.add('active');
        return;
    }

    // Otherwise, find the current section
    let currentSection = '';
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.offsetHeight;
        if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
            currentSection = section.id;
        }
    });

    // Update active states
    document.querySelectorAll('.nav-links a, .mobile-nav a').forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${currentSection}`) {
            link.classList.add('active');
        }
    });
}

// Scroll to content function
function scrollToContent() {
    window.scrollBy({
        top: window.innerHeight,
        behavior: 'smooth'
    });
}

// Show notification
function showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'notification';
    notification.textContent = message;
    notification.style.cssText = `
            position: fixed;
            top: 120px;
            right: 20px;
            background-color: var(--primary-black);
            color: white;
            padding: 20px 30px;
            border-radius: 5px;
            z-index: 1002;
            box-shadow: 0 5px 15px rgba(0,0,0,0.5);
            animation: slideIn 0.3s ease;
            max-width: 400px;
            font-weight: 600;
            border-left: 5px solid var(--primary-red);
        `;

    document.body.appendChild(notification);

    // Add CSS for notification animations if not already present
    if (!document.querySelector('#notification-styles')) {
        const style = document.createElement('style');
        style.id = 'notification-styles';
        style.textContent = `
                @keyframes slideIn {
                    from { transform: translateX(100%); opacity: 0; }
                    to { transform: translateX(0); opacity: 1; }
                }
                @keyframes slideOut {
                    from { transform: translateX(0); opacity: 1; }
                    to { transform: translateX(100%); opacity: 0; }
                }
            `;
        document.head.appendChild(style);
    }

    // Remove notification after 4 seconds
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease';
        setTimeout(() => {
            if (notification.parentNode) {
                document.body.removeChild(notification);
            }
        }, 300);
    }, 4000);
}

// Custom cursor
function setupCustomCursor() {
    const cursorDot = document.querySelector('.cursor-dot');
    const cursorOutline = document.querySelector('.cursor-outline');

    if (cursorDot && cursorOutline) {
        window.addEventListener('mousemove', (e) => {
            const posX = e.clientX;
            const posY = e.clientY;

            // Dot follows instantly
            cursorDot.style.left = `${posX}px`;
            cursorDot.style.top = `${posY}px`;

            // Outline follows with slight delay
            cursorOutline.animate({
                left: `${posX}px`,
                top: `${posY}px`
            }, { duration: 1000, fill: "forwards" });
        });
    }
}
function handleTimelineProgress() {
    const wrapper = document.querySelector('.timeline-wrapper');
    const progressLine = document.getElementById('timelineProgress');

    if (!wrapper || !progressLine) return;

    // Get the position of the timeline section
    const rect = wrapper.getBoundingClientRect();
    const windowHeight = window.innerHeight;

    // Calculate progress: 
    // Starts when the top of the wrapper enters the middle of the screen
    // Ends when the bottom of the wrapper leaves the middle of the screen
    const startPoint = windowHeight / 2;
    const scrollPosition = startPoint - rect.top;
    const totalHeight = rect.height;

    // Convert to percentage (clamped between 0 and 100)
    let progress = (scrollPosition / totalHeight) * 100;
    progress = Math.min(Math.max(progress, 0), 100);

    progressLine.style.height = `${progress}%`;
}

// Listen for scroll events
window.addEventListener('scroll', handleTimelineProgress);
// Also run it on load to catch current position
window.addEventListener('load', handleTimelineProgress);

 