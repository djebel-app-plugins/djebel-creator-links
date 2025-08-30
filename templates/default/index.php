    <style>
        .oapp-body {
            font-family: 'Arial', sans-serif;
            padding: 20px 0;
        }

        .oapp-profile-pic {
            width: 150px;
            height: 150px;
            object-fit: cover;
        }

        .oapp-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .oapp-content {
            text-align: center;
        }

        .oapp-profile-section {
            margin-top: 3rem;
        }

        .oapp-social-grid {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-top: 2rem;
        }

        .oapp-name {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 2rem;
        }

        .oapp-social-btn {
            font-size: 1.2rem;
            font-weight: 600;
            border: none;
            padding: 16px 24px;
            margin: 8px 0;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            text-decoration: none;
        }

        .oapp-social-btn svg {
            width: 24px;
            height: 24px;
        }

        .oapp-social-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .oapp-social-btn:active {
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Social network button colors using CSS custom properties */
        :root {
            --facebook-bg: #1877f2;
            --facebook-hover: #1664d9;
            --linkedin-bg: #0077b5;
            --linkedin-hover: #006399;
            --twitter-bg: #1da1f2;
            --twitter-hover: #1a8cd8;
            --email-bg: #ea4335;
            --email-hover: #d33828;
            --website-bg: #333333;
            --website-hover: #262626;
            --tiktok-bg: #000000;
            --tiktok-hover: #1a1a1a;
            --youtube-bg: #ff0000;
            --youtube-hover: #cc0000;
            --instagram-bg: #e4405f;
            --instagram-hover: #c13584;
        }

        /* Base social button styling */
        .oapp-social-btn {
            color: white !important;
        }

        /* Individual network styling using CSS custom properties */
        .oapp-facebook-btn { background-color: var(--facebook-bg); }
        .oapp-facebook-btn:hover { background-color: var(--facebook-hover); }

        .oapp-linkedin-btn { background-color: var(--linkedin-bg); }
        .oapp-linkedin-btn:hover { background-color: var(--linkedin-hover); }

        .oapp-twitter-btn { background-color: var(--twitter-bg); }
        .oapp-twitter-btn:hover { background-color: var(--twitter-hover); }

        .oapp-email-btn { background-color: var(--email-bg); }
        .oapp-email-btn:hover { background-color: var(--email-hover); }

        .oapp-website-btn { background-color: var(--website-bg); }
        .oapp-website-btn:hover { background-color: var(--website-hover); }

        .oapp-tiktok-btn { background-color: var(--tiktok-bg); }
        .oapp-tiktok-btn:hover { background-color: var(--tiktok-hover); }

        .oapp-youtube-btn { background-color: var(--youtube-bg); }
        .oapp-youtube-btn:hover { background-color: var(--youtube-hover); }

        .oapp-instagram-btn { background-color: var(--instagram-bg); }
        .oapp-instagram-btn:hover { background-color: var(--instagram-hover); }

        @media (max-width: 768px) {
            .oapp-social-btn {
                padding: 14px 20px;
                font-size: 1.1rem;
            }

            .oapp-name {
                font-size: 2rem;
            }
        }
    </style>

    <?php
    $ctx = Dj_App_Util::data('plugin_social_links_data');
    $social_networks = $ctx['social_networks'];
    $full_name = empty($ctx['full_name']) ? '' : $ctx['full_name'];
    $profile_image_url = empty($ctx['profile_image_url']) ? '' : $ctx['profile_image_url'];
    ?>

    <div class="oapp-container">
        <div class="oapp-content">
            <div class="oapp-profile-section">
                    <?php if (!empty($profile_image_url)) : ?>
                        <img src="<?php echo htmlspecialchars($profile_image_url); ?>"
                         alt="Profile Picture"
                         class="rounded-circle mb-3 oapp-profile-pic" />
                    <?php endif; ?>

                    <?php if (!empty($full_name)) : ?>
                        <h1 class="mb-4 oapp-name"><?php echo htmlspecialchars($full_name); ?></h1>
                    <?php endif; ?>

                    <div class="oapp-social-grid">
                        <?php if (empty($social_networks)) : ?>
                            <p>No social networks enabled</p>
                        <?php endif; ?>

                        <?php foreach ($social_networks as $network => $data): ?>
                            <a href="<?php echo htmlspecialchars($data['url']); ?>" 
                               class="oapp-social-btn oapp-<?php echo $network; ?>-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                     width="24" 
                                     height="24" 
                                     viewBox="0 0 24 24" 
                                     fill="none"
                                     stroke="currentColor" 
                                     stroke-width="2" 
                                     stroke-linecap="round" 
                                     stroke-linejoin="round">
                                    <?php echo $data['svg']; ?>
                                </svg>
                                <?php echo ucfirst($network); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
