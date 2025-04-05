?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karate Combat - Official Mobile App</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        
        :root {
            --primary-red: #FF3A2F;
            --dark-bg: #0A0A0A;
            --light-text: #F5F5F5;
            --accent-gold: #FFD700;
            --section-spacing: 8rem;
            --card-bg: rgba(255, 255, 255, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--dark-bg);
            color: var(--light-text);
            line-height: 1.6;
            overflow-x: hidden;
        }

        
        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--dark-bg);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            animation: fadeOut 1s 2s forwards;
        }

        .loader-spinner {
            width: 50px;
            height: 50px;
            border: 4px solid var(--primary-red);
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 1s linear infinite;
        }

        header {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 1.5rem 5%;
            background: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(10px);
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 100;
        }

        .logo {
            width: 60px;
            transition: transform 0.3s ease;
            height: 60px;
        }

        nav a {
            color: var(--light-text);
            text-decoration: none;
            margin-left: 2rem;
            font-weight: 600;
            position: relative;
            padding: 0.5rem 0;
        }

        nav a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-red);
            transition: width 0.3s ease;
        }

        nav a:hover::after {
            width: 100%;
        }

        .hero-section {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(45deg, rgba(10, 10, 10, 0.9), rgba(10, 10, 10, 0.7)),
                        url('hero-bg.jpg') center/cover fixed;
            text-align: center;
            padding: 0 5%;
        }

        .hero-content {
            max-width: 800px;
            transform: translateY(50px);
            opacity: 0;
            animation: slideUp 1s 2.5s forwards;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            background: linear-gradient(to right, var(--accent-gold), var(--primary-red));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-content p {
            font-size: 1.25rem;
            margin-bottom: 2.5rem;
            color: rgba(245, 245, 245, 0.9);
        }

        .cta-button {
            background: linear-gradient(135deg, var(--primary-red), #FF6B6B);
            color: var(--light-text);
            padding: 1.25rem 3rem;
            border-radius: 50px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: none;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .cta-button::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                120deg,
                transparent,
                rgba(255, 255, 255, 0.3),
                transparent
            );
            transition: left 0.6s;
        }

        .cta-button:hover::after {
            left: 100%;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: var(--section-spacing) 5%;
        }

        .feature-card {
            background: var(--card-bg);
            padding: 2.5rem;
            border-radius: 20px;
            backdrop-filter: blur(10px);
           
            transform: translateY(50px);
            opacity: 0;
            transition: transform 0.4s ease, opacity 0.4s ease;
        }

        .feature-card.visible {
            transform: translateY(0);
            opacity: 1;
        }

        .feature-card h3 {
            color: var(--accent-gold);
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; visibility: hidden; }
        }

        @keyframes slideUp {
            to { transform: translateY(0); opacity: 1; }
        }

        @media (max-width: 768px) {
            header {
                padding: 1rem 5%;
            }

            .logo {
                width: 140px;
            }

            nav a {
                margin-left: 1.5rem;
                font-size: 0.9rem;
            }

            .hero-content h1 {
                font-size: 2.5rem;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .section-title {
                font-size: 2rem;
            }

            .token-info {
                flex-direction: column;
                align-items: center;
            }

            .token-card {
                width: 100%;
                max-width: 350px;
                margin-bottom: 2rem;
            }

            .feature-showcase {
                flex-direction: column;
            }

            .showcase-image, .showcase-content {
                width: 100%;
            }

            .showcase-content {
                padding: 2rem 0 0;
            }

            .download-options {
                flex-direction: column;
                gap: 1rem;
            }

            .pie-chart {
                width: 200px;
                height: 200px;
            }

            .chart-center {
                width: 120px;
                height: 120px;
            }
        }
        .tokenomics-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 4rem 5%;
    background: linear-gradient(to bottom, rgba(10, 10, 10, 0.7), rgba(10, 10, 10, 0.9));
    border-radius: 20px;
    margin: 0 5%;
    max-width: 1200px;
    margin: 2rem auto;
}

.section-title {
    font-size: 2.5rem;
    color: var(--light-text);
    margin-bottom: 3rem;
    text-align: center;
}

.token-info {
    display: flex;
    justify-content: space-around;
    width: 100%;
    margin-bottom: 3rem;
}

.token-card {
    background: var(--card-bg);
    padding: 2rem;
    border-radius: 15px;
    text-align: center;
  
    backdrop-filter: blur(10px);
    width: 30%;
    min-width: 250px;
    transition: transform 0.3s ease;
}

.token-card:hover {
    transform: translateY(-5px);
}

.token-value {
    font-size: 2rem;
    font-weight: 700;
    color: var(--accent-gold);
    margin-bottom: 0.5rem;
}

.token-label {
    font-size: 1.1rem;
    color: rgba(245, 245, 245, 0.8);
}

.distribution-chart {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    max-width: 600px;
}

.pie-chart {
    width: 300px;
    height: 300px;
    border-radius: 50%;
    position: relative;
    background: conic-gradient(
        #FF6B6B 0% 30%,
        #4AC29A 30% 50%,
        #FFDA63 50% 70%,
        #5DADE2 70% 85%,
        #C6A3FE 85% 100%
    );
    margin-bottom: 2rem;
}

.chart-center {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 180px;
    height: 180px;
    border-radius: 50%;
    background: var(--dark-bg);
    color: var(--light-text);
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 1.5rem;
    font-weight: 600;
}

.legend {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    width: 100%;
}

.legend-item {
    display: flex;
    align-items: center;
    margin-bottom: 0.75rem;
}

.legend-color {
    width: 18px;
    height: 18px;
    border-radius: 50%;
    margin-right: 1rem;
}

.color-community { background-color: #FF6B6B; }
.color-liquidity { background-color: #4AC29A; }
.color-team { background-color: #FFDA63; }
.color-marketing { background-color: #5DADE2; }
.color-reserve { background-color: #C6A3FE; }
        
#features-expanded {
    padding: 6rem 0;
    position: relative;
    overflow: hidden;
}

#features-expanded::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(10, 10, 10, 0.8);
    z-index: 1;
}

.features-container {
    position: relative;
    z-index: 2;
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem 5%;
}

.feature-tabs {
    display: flex;
    justify-content: center;
    margin-bottom: 3rem;
}

.tab-button {
    background: rgba(255, 255, 255, 0.08);
    color: var(--light-text);
    padding: 1rem 2rem;
    border: none;
    border-radius: 50px;
    margin: 0 0.5rem;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
    font-weight: 600;
    letter-spacing: 0.5px;
}

.tab-button:hover, .tab-button.active {
    background: var(--primary-red);
    color: var(--light-text);
}

.tab-content {
    display: none;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.tab-content.active {
    display: grid;
}

.feature-showcase {
    
    background: var(--card-bg);
    display: flex;
   
    overflow: hidden;
}

.showcase-image {
    width: 50%;
    background: url('showcase-image.jpg') center/cover no-repeat;
}

.showcase-content {
    width: 50%;
    padding: 3rem;
}

.showcase-content h3 {
    font-size: 2rem;
    color: var(--accent-gold);
    margin-bottom: 1rem;
}

.showcase-content p {
    color: rgba(245, 245, 245, 0.9);
    margin-bottom: 2rem;
}

.feature-list {
    list-style: none;
    padding: 0;
    margin-bottom: 2rem;
}

.feature-list li {
    position: relative;
    padding-left: 1.5rem;
    margin-bottom: 0.75rem;
    color: rgba(245, 245, 245, 0.8);
}

.feature-list li::before {
    content: 'âœ“';
    position: absolute;
    left: 0;
    color: var(--accent-gold);
}


#download {
    padding: var(--section-spacing) 5%;
    text-align: center;
}

.download-container {
    max-width: 1000px;
    margin: 0 auto;
}

.devices-mockup {
    
    height: 300px;
    background: url('devices-mockup.png') center/contain no-repeat;
    margin-bottom: 3rem;
}

.download-options {
    display: flex;
    justify-content: center;
    gap: 2rem;
    margin-bottom: 3rem;
}

.download-button {
    display: flex;
    align-items: center;
    background: var(--card-bg);
    border-radius: 15px;
    padding: 1rem 2rem;
    text-decoration: none;
    color: var(--light-text);
    
    transition: transform 0.3s ease;
}

.download-button:hover {
    transform: translateY(-5px);
}

.download-icon {
    width: 30px;
    height: 30px;
    fill: var(--light-text);
    margin-right: 1rem;
}

.download-text {
    display: flex;
    flex-direction: column;
    text-align: left;
}

.download-text .small-text {
    font-size: 0.8rem;
    color: rgba(245, 245, 245, 0.7);
}

.download-text .big-text {
    font-size: 1.2rem;
    font-weight: 600;
}

.newsletter {
    background: var(--card-bg);
    padding: 2rem;
    border-radius: 15px;
    
    max-width: 600px;
    margin: 0 auto;
}

.newsletter h3 {
    font-size: 1.5rem;
    margin-bottom: 1rem;
}

.email-form {
    display: flex;
}

.email-input {
    flex-grow: 1;
    background: rgba(255, 255, 255, 0.1);
    border: none;
    border-radius: 5px;
    padding: 1rem;
    color: var(--light-text);
    font-size: 1rem;
}

.email-input::placeholder {
    color: rgba(245, 245, 245, 0.5);
}

.submit-button {
    background: var(--primary-red);
    color: var(--light-text);
    border: none;
    border-radius: 5px;
    padding: 1rem 2rem;
    cursor: pointer;
    font-weight: 600;
    transition: background-color 0.3s ease;
}

.submit-button:hover {
    background-color: #D62A20;
}
        
footer {
    background: var(--dark-bg);
    padding: 3rem 5%;
    text-align: center;
    
}

.social-links {
    display: flex;
    justify-content: center;
    gap: 2rem;
    margin-bottom: 1.5rem;
}

.social-link {
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--card-bg);
    border-radius: 50%;
    width: 40px;
    height: 40px;
    text-decoration: none;
    transition: transform 0.3s ease;
}

.social-link:hover {
    transform: translateY(-3px);
}

.social-icon {
    width: 20px;
    height: 20px;
    fill: var(--light-text);
}

footer p {
    color: rgba(245, 245, 245, 0.7);
    font-size: 0.9rem;
}

        
    </style>

<body>
    <div class="loader">
        <div class="loader-spinner"></div>
    </div>

    <header>
        <img src="reg.jpeg"  alt="Karate Combat" class="logo">
        <nav>
            <a href="#features">Features</a>
            <a href="#stats">Tokenomics</a>
            <a href="#features-expanded">Advanced</a>
            <a href="#download">Download</a>
        </nav>
    </header>

    <section class="hero-section">
        <div class="hero-content">
            <h1>Master the Art of Combat Finance</h1>
            <p>Join millions of martial arts enthusiasts in the world's first combat sports decentralized autonomous organization</p>
            <button class="cta-button">Start Your Journey</button>
        </div>
    </section>

    <section id="features" class="features-grid">
        <div class="feature-card">
            <h3>Decentralized Governance</h3>
            <p>Vote on match outcomes, fighter contracts, and promotional decisions through our blockchain-powered democratic system. Your voice matters in shaping the future of Karate Combat.</p>
        </div>
        <div class="feature-card">
            <h3>Exclusive Content</h3>
            <p>Gain access to behind-the-scenes footage, fighter interviews, and training sessions available only to app users and token holders. Experience Karate Combat like never before.</p>
        </div>
        <div class="feature-card">
            <h3>Earn While You Watch</h3>
            <p>Earn rewards by participating in fight predictions, engaging with content, and contributing to the Karate Combat ecosystem. Turn your passion into profit.</p>
        </div>
     
    </section>

    <section id="stats" class="tokenomics-section">
        <div class="tokenomics-container">
            <h2 class="section-title">Tokenomics</h2>
            <div class="token-info">
                <div class="token-card">
                    <div class="token-value">1,000,000,000</div>
                    <div class="token-label">Total KCBT Supply</div>
                </div>
                <div class="token-card">
                    <div class="token-value">$0.125</div>
                    <div class="token-label">Current Token Price</div>
                </div>
                <div class="token-card">
                    <div class="token-value">250,000+</div>
                    <div class="token-label">Active Holders</div>
                </div>
            </div>
            <div class="distribution-chart">
                <div class="pie-chart">
                    <div class="chart-center">KCBT</div>
                </div>
                <div class="legend">
                    <div class="legend-item">
                        <div class="legend-color color-community"></div>
                        <div>Community & Rewards - 30%</div>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color color-liquidity"></div>
                        <div>Liquidity & Exchange - 20%</div>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color color-team"></div>
                        <div>Team & Advisors - 20%</div>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color color-marketing"></div>
                        <div>Marketing & Partnerships - 15%</div>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color color-reserve"></div>
                        <div>Reserve Fund - 15%</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features-expanded">
        <div class="features-container">
            <h2 class="section-title">Advanced Features</h2>
            <div class="feature-tabs">
                <button class="tab-button active">Betting</button>
                <button class="tab-button">Staking</button>
                <button class="tab-button">Governance</button>
            </div>
            <div class="tab-content active">
                <div class="feature-showcase">
                    <div class="showcase-image"><img src="reg2.jpg" alt="" style="height: 700px; width: 1200px;"> </div>
                    <div class="showcase-content">
                        <h3>Decentralized Betting</h3>
                        <p>Our blockchain-powered betting platform offers complete transparency and lower fees than traditional sportsbooks.</p>
                        <ul class="feature-list">
                            <li>Peer-to-peer betting with no middleman</li>
                            <li>Custom bet creation and sharing</li>
                            <li>Real-time odds adjustment</li>
                            <li>Instant payouts post-match</li>
                        </ul>
                        <button class="cta-button">Try Betting</button>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="feature-showcase">
                    <div class="showcase-image"><img src="reg2.jpg" alt="" style="height: 700px; width: 1200px;"></div>
                    <div class="showcase-content">
                        <h3>Token Staking</h3>
                        <p>Lock your KCBT tokens to earn passive income and gain voting power in the Karate Combat ecosystem.</p>
                        <ul class="feature-list">
                            <li>Up to 15% APY returns</li>
                            <li>Flexible and locked staking options</li>
                            <li>Exclusive rewards for long-term stakers</li>
                            <li>Boosted governance influence</li>
                        </ul>
                        <button class="cta-button">Start Staking</button>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="feature-showcase">
                    <div class="showcase-image"><img src="reg2.jpg" alt="" style="height: 800px; width: 1200px;"></div>
                    <div class="showcase-content">
                        <h3>Community Governance</h3>
                        <p>Shape the future of Karate Combat by voting on important decisions and proposals.</p>
                        <ul class="feature-list">
                            <li>Vote on fighter contracts and matchups</li>
                            <li>Influence rule changes and tournament formats</li>
                            <li>Participate in treasury allocation decisions</li>
                            <li>Submit your own proposals for voting</li>
                        </ul>
                        <button class="cta-button">Explore Governance</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="download">
        <div class="download-container">
            <h2 class="section-title">Download Our App</h2>
            <div class="devices-mockup"><img src="reg2.jpg" alt="'" style="height: 300px; width: 350px;"> </div>
            <div class="download-options">
                <a href="#" class="download-button">
                    <svg class="download-icon" viewBox="0 0 24 24">
                        <path d="M17.9,9.2C17.6,6.4,15.2,4,12.4,4c-2.1,0-4,1.3-4.8,3.2C5.3,7.2,3.5,8.8,3.5,11c0,2.5,2,4.5,4.5,4.5h9c2.2,0,4-1.8,4-4C21,9.9,19.7,8.3,17.9,9.2z"></path>
                    </svg>
                    <div class="download-text">
                        <span class="small-text">Download on the</span>
                        <span class="big-text">App Store</span>
                    </div>
                </a>
                <a href="#" class="download-button">
                    <svg class="download-icon" viewBox="0 0 24 24">
                        <path d="M17.5,2L9.5,9.6L12,12l-2.5,2.4l8,7.6V2z M6.1,9.5L3.5,12l2.6,2.5l2-2l-2-2L6.1,9.5z"></path>
                    </svg>
                    <div class="download-text">
                        <span class="small-text">GET IT ON</span>
                        <span class="big-text">Google Play</span>
                    </div>
                </a>
            </div>
            <div class="newsletter">
                <h3>Stay Updated</h3>
                <p>Subscribe to our newsletter to receive app updates, token news, and exclusive offers.</p>
                <form class="email-form">
                    <input type="email" class="email-input" placeholder="Enter your email">
                    <button type="submit" class="submit-button">Subscribe</button>
                </form>
            </div>
        </div>
    </section>

    <footer>
        <div class="social-links">
            <a href="#" class="social-link">
                <svg class="social-icon" viewBox="0 0 24 24">
                    <path d="M12,2C6.5,2,2,6.5,2,12c0,5,3.7,9.1,8.4,9.9v-7H7.9V12h2.5V9.8c0-2.5,1.5-3.9,3.8-3.9c1.1,0,2.2,0.2,2.2,0.2v2.5h-1.3c-1.2,0-1.6,0.8-1.6,1.6V12h2.8l-0.4,2.9h-2.3v7C18.3,21.1,22,17,22,12C22,6.5,17.5,2,12,2z"></path>
                </svg>
            </a>
            <a href="#" class="social-link">
                <svg class="social-icon" viewBox="0 0 24 24">
                    <path d="M22.2,5.6c-0.8,0.3-1.6,0.6-2.4,0.7c0.9-0.5,1.5-1.3,1.8-2.3c-0.8,0.5-1.7,0.8-2.6,1c-0.8-0.8-1.8-1.3-3-1.3c-2.3,0-4.1,1.8-4.1,4.1c0,0.3,0,0.6,0.1,0.9C8.2,8.5,4.7,6.9,2.5,4.3C2.1,5,1.9,5.7,1.9,6.5c0,1.4,0.7,2.7,1.8,3.4C3,9.9,2.4,9.7,1.8,9.4v0.1c0,2,1.4,3.7,3.3,4c-0.3,0.1-0.7,0.1-1.1,0.1c-0.3,0-0.5,0-0.8-0.1c0.5,1.6,2,2.8,3.8,2.8c-1.4,1.1-3.2,1.8-5.1,1.8c-0.3,0-0.7,0-1-0.1c1.8,1.2,4,1.8,6.3,1.8c7.5,0,11.7-6.2,11.7-11.7c0-0.2,0-0.4,0-0.5C20.9,7.2,21.6,6.4,22.2,5.6z"></path>
                </svg>
            </a>
            <a href="#" class="social-link">
                <svg class="social-icon" viewBox="0 0 24 24">
                    <path d="M12,2.2c3.2,0,3.6,0,4.9,0.1c1.2,0.1,1.8,0.2,2.2,0.4c0.6,0.2,1,0.5,1.4,0.9c0.4,0.4,0.7,0.9,0.9,1.4c0.2,0.4,0.4,1.1,0.4,2.2c0.1,1.3,0.1,1.7,0.1,4.9s0,3.6-0.1,4.9c-0.1,1.2-0.2,1.8-0.4,2.2c-0.2,0.6-0.5,1-0.9,1.4c-0.4,0.4-0.9,0.7-1.4,0.9c-0.4,0.2-1.1,0.4-2.2,0.4c-1.3,0.1-1.7,0.1-4.9,0.1s-3.6,0-4.9-0.1c-1.2-0.1-1.8-0.2-2.2-0.4c-0.6-0.2-1-0.5-1.4-0.9c-0.4-0.4-0.7-0.9-0.9-1.4c-0.2-0.4-0.4-1.1-0.4-2.2c-0.1-1.3-0.1-1.7-0.1-4.9s0-3.6,0.1-4.9c0.1-1.2,0.2-1.8,0.4-2.2c0.2-0.6,0.5-1,0.9-1.4c0.4-0.4,0.9-0.7,1.4-0.9c0.4-0.2,1.1-0.4,2.2-0.4C8.4,2.2,8.8,2.2,12,2.2M12,0C8.7,0,8.3,0,7.1,0.1c-1.3,0.1-2.2,0.3-3,0.6C3.4,1,2.7,1.3,2,2C1.3,2.7,0.9,3.4,0.6,4.1c-0.3,0.8-0.5,1.7-0.6,3C0,8.3,0,8.7,0,12s0,3.7,0.1,4.9c0.1,1.3,0.3,2.2,0.6,3C1,20.6,1.3,21.3,2,22c0.7,0.7,1.4,1.1,2.1,1.4c0.8,0.3,1.7,0.5,3,0.6C8.3,24,8.7,24,12,24s3.7,0,4.9-0.1c1.3-0.1,2.2-0.3,3-0.6c0.7-0.3,1.4-0.7,2.1-1.4c0.7-0.7,1.1-1.4,1.4-2.1c0.3-0.8,0.5-1.7,0.6-3C24,15.7,24,15.3,24,12s0-3.7-0.1-4.9c-0.1-1.3-0.3-2.2-0.6-3C23,3.4,22.7,2.7,22,2c-0.7-0.7-1.4-1.1-2.1-1.4c-0.8-0.3-1.7-0.5-3-0.6C15.7,0,15.3,0,12,0L12,0z"></path>
                    <path d="M12,5.8c-3.4,0-6.2,2.8-6.2,6.2s2.8,6.2,6.2,6.2s6.2-2.8,6.2-6.2S15.4,5.8,12,5.8z M12,16c-2.2,0-4-1.8-4-4s1.8-4,4-4s4,1.8,4,4S14.2,16,12,16z"></path>
                    <circle cx="18.4" cy="5.6" r="1.4"></circle>
                </svg>
            </a>
            <a href="#" class="social-link">
                <svg class="social-icon" viewBox="0 0 24 24">
                    <path d="M23,8.2v7.5c0,0.9-0.2,1.8-0.5,2.6c-0.3,0.8-0.8,1.5-1.4,2.1c-0.6,0.6-1.3,1.1-2.1,1.4c-0.8,0.3-1.7,0.5-2.6,0.5H7.6c-0.9,0-1.8-0.2-2.6-0.5c-0.8-0.3-1.5-0.8-2.1-1.4c-0.6-0.6-1.1-1.3-1.4-2.1C1.2,17.5,1,16.6,1,15.7V8.2C1,6.3,1.8,4.5,3.1,3.1C4.5,1.8,6.3,1,8.2,1h6c1.9,0,3.6,0.8,4.9,2.1C20.3,4.4,21,6.3,21,8.2H23z M4.8,12c0,2,1.6,3.6,3.6,3.6h7.1c2,0,3.6-1.6,3.6-3.6V8.4c0-2-1.6-3.6-3.6-3.6H8.4c-2,0-3.6,1.6-3.6,3.6V12z"></path>
                </svg>
            </a>
            <a href="#" class="social-link">
                <svg class="social-icon" viewBox="0 0 24 24">
                    <path d="M22.2,6c-0.6,0.3-1.2,0.4-1.9,0.5c0.7-0.4,1.2-1,1.4-1.8c-0.6,0.4-1.3,0.6-2.1,0.8c-0.6-0.6-1.5-1-2.4-1c-1.8,0-3.3,1.5-3.3,3.3c0,0.3,0,0.5,0.1,0.7c-2.7-0.1-5.2-1.4-6.8-3.4c-0.3,0.5-0.4,1-0.4,1.7c0,1.1,0.6,2.1,1.5,2.7c-0.5,0-1-0.2-1.5-0.4c0,0,0,0,0,0.1c0,1.6,1.1,2.9,2.6,3.2c-0.3,0.1-0.6,0.1-0.9,0.1c-0.2,0-0.4,0-0.6-0.1c0.4,1.3,1.6,2.3,3.1,2.3c-1.1,0.9-2.5,1.4-4.1,1.4c-0.3,0-0.5,0-0.8,0c1.5,0.9,3.2,1.5,5,1.5c6,0,9.3-5,9.3-9.3c0-0.1,0-0.3,0-0.4C21.2,7.3,21.8,6.7,22.2,6z"></path>
                </svg>
            </a>
        </div>
        <p>© 2025 Karate Combat. All rights reserved.</p>
        <p>Karate Combat Token (KCBT) is a utility token and not a security.</p>
    </footer>

    <script>
    
        document.addEventListener('DOMContentLoaded', function() {
            
            setTimeout(function() {
                document.querySelector('.loader').style.display = 'none';
            }, 3000);
            
            
            const featureCards = document.querySelectorAll('.feature-card');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.1 });
            
            featureCards.forEach(card => {
                observer.observe(card);
            });
            
            
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');
            
            tabButtons.forEach((button, index) => {
                button.addEventListener('click', () => {
                    
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));
                    
                    
                    button.classList.add('active');
                    tabContents[index].classList.add('active');
                });
            });
        });
    </script>
</body>
</html> 

