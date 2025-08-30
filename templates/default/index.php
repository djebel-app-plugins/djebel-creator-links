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

        /* Global social button styling - automatically applies to all networks */
        .oapp-social-btn {
            color: white !important;
        }

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
