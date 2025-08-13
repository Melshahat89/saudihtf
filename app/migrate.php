ALTER TABLE `courses` ADD `vdocipher_tag` VARCHAR(255) NULL DEFAULT NULL AFTER `accreditation_text`;
CREATE TABLE `igtsserv_laravel`.`posts` ( `id` INT(12) NOT NULL AUTO_INCREMENT , `title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL , `slug` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
ALTER TABLE `courseincludes` ADD `included_course_title` VARCHAR(255) NULL DEFAULT NULL AFTER `included_course`;
ALTER TABLE `courseincludes` CHANGE `position` `position` INT(12) NULL DEFAULT NULL;
ALTER TABLE `courseincludes` CHANGE `position` `position` INT(12) NULL DEFAULT '0';


CREATE TABLE `igts-laravel`.`paymentmethods` ( `id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(255) NOT NULL , `logo` VARCHAR(255) NOT NULL , `status` INT(1) NOT NULL , `created_at` TIMESTAMP NULL , `updated_at` TIMESTAMP NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
ALTER TABLE `orders` ADD `paypalorderid` INT(12) NULL AFTER `fawryRefNumber`;
ALTER TABLE `orders` CHANGE `paypalorderid` `paypalorderid` VARCHAR(255) NULL DEFAULT NULL;
ALTER TABLE `paymentmethods` ADD `action` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `updated_at`;

ALTER TABLE `paymentmethods` ADD `class` VARCHAR(50) NULL AFTER `action`;
ALTER TABLE `courseenrollment` ADD `certificate` VARCHAR(255) NULL AFTER `courses_id`;
ALTER TABLE `courses` ADD `webinar_url` VARCHAR(255) NULL AFTER `vdocipher_tag`;



ALTER TABLE `careers` CHANGE `description` `description` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;
ALTER TABLE `careers` ADD `link` VARCHAR(255) NULL AFTER `updated_at`;


////////////////// OFFLINE ORDERS ////////////////////////////////
ALTER TABLE `orders` ADD `emp_id` INT(12) NULL AFTER `accept_status`;
ALTER TABLE `orders` ADD `type` INT(12) NOT NULL DEFAULT '1' AFTER `emp_id`;


/////////////////// DIRECTPAY //////////////////////////////////
CREATE TABLE `directpayauth` ( `id` INT NOT NULL AUTO_INCREMENT , `user_id` INT NOT NULL , `orders_id` INT NOT NULL , `created_at` TIMESTAMP NULL , `updated_at` TIMESTAMP NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

######################### Show Hide Certificates ####################
ALTER TABLE `certificates` ADD `visible` TINYINT(1) NOT NULL DEFAULT '1' AFTER `updated_at`;


################## POST AFFILIATE PRO ####################
ALTER TABLE `orders` ADD `aff_id` VARCHAR(255) NULL AFTER `type`;
ALTER TABLE `orders` ADD `aff_channel` VARCHAR(255) NULL AFTER `aff_id`;


##################### 22/3/2022 Ramadan Free Course ##################
ALTER TABLE `categories` ADD `courses_id` INT(12) NULL AFTER `class`, ADD `end_time` DATE NULL AFTER `courses_id`, ADD `enable_free` TINYINT(1) NULL DEFAULT '0' AFTER `end_time`;

##################### Re-branding ########################
ALTER TABLE `categories` CHANGE `class` `color_code` VARCHAR(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `slider` ADD `cta_text` VARCHAR(255) NULL AFTER `updated_at`;
ALTER TABLE `slider` CHANGE `image_m_ar` `image` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `slider` DROP `image_m_en`, DROP `image_d_ar`, DROP `image_d_en`;
ALTER TABLE `slider` ADD `cta_link` VARCHAR(255) NULL AFTER `cta_text`;
ALTER TABLE `slider` CHANGE `cta_link` `cta_link` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;


######################### Custom Reset Password ########################
ALTER TABLE `password_resets` ADD `id` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`);
ALTER TABLE `password_resets` ADD `updated_at` TIMESTAMP NULL AFTER `created_at`;
ALTER TABLE `password_resets` ADD `confirmed` BOOLEAN NULL DEFAULT FALSE AFTER `token`;

####################### Countries 21/7/2022 ############################
CREATE TABLE `countries` ( `id` INT(12) NOT NULL , `country_code` VARCHAR(255) NOT NULL , `country_phone_code` VARCHAR(255) NOT NULL , `created_at` TIMESTAMP NULL , `updated_at` TIMESTAMP NULL ) ENGINE = InnoDB;
ALTER TABLE `countries` ADD PRIMARY KEY( `id`);
ALTER TABLE `countries` CHANGE `id` `id` INT NOT NULL AUTO_INCREMENT;
ALTER TABLE `countries` ADD `name` VARCHAR(255) NOT NULL AFTER `id`;
ALTER TABLE `users` ADD `country_id` INT(12) NULL AFTER `otp`;


################# Migrations 15/9/2022 ######################
insert into migrations(migration, batch) values('2022_08_10_151715_create_telescope_entries_table',1)
insert into migrations(migration, batch) values('2016_06_01_000001_create_oauth_auth_codes_table',1) <<<
insert into migrations(migration, batch) values('2016_06_01_000002_create_oauth_access_tokens_table',1) <<<
insert into migrations(migration, batch) values('2016_06_01_000003_create_oauth_refresh_tokens_table',1) <<<
insert into migrations(migration, batch) values('2016_06_01_000004_create_oauth_clients_table',1)
insert into migrations(migration, batch) values('2016_06_01_000005_create_oauth_personal_access_clients_table',1)
insert into migrations(migration, batch) values('2019_12_14_000001_create_personal_access_tokens_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_becomeinstructor_table',1) 
insert into migrations(migration, batch) values('2022_10_24_142918_create_becomeinstructor_table',1) <<<
insert into migrations(migration, batch) values('2022_08_10_151715_create_businesscourses_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_businessdata_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_businessdomains_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_businessgroups_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_businessgroupscourses_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_businessgroupsusers_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_businessinputfields_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_businessinputfieldsresponses_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_businessuserspendingemails_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_careers_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_careersresponses_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_categorie_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_categories_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_certificates_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_certificatescontainer_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_certificatesenrollment_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_command_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_contacts_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_countries_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_courseenrollment_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_courseincludes_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_courselectures_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_coursenotes_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_courserelated_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_coursereport_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_courseresources_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_coursereviews_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_courses_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_coursesections_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_coursesrelatedevents_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_coursewishlist_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_directpayauth_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_dynamic_fields_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_events_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_eventsdata_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_eventsenrollment_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_eventsreviews_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_eventstickets_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_faq_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_group_role_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_groups_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_homesettings_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_institution_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_items_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_lecturequestions_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_lecturequestionsanswers_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_lectures3d_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_link_views_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_links_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_logs_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_masterrequest_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_menu_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_oauth_access_tokens_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_oauth_auth_codes_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_oauth_clients_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_oauth_refresh_tokens_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_orders_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_ordersposition_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_page_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_pagecomment_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_pagerate_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_partners_table',1)
insert into migrations(migration, batch) values('2022_08_10_151715_create_partners_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_partnership_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_password_resets_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_paymentmethods_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_payments_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_permission_group_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_permission_role_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_permission_user_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_permissions_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_posts_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_progress_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_promotionactive_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_promotioncourses_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_promotionevents_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_promotions_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_promotionusers_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_quiz_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_quizquestions_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_quizquestionschoice_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_quizstudentsanswers_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_quizstudentsstatus_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_relations_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_role_user_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_roles_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_searchkeys_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_setting_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_slider_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_social_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_talklikes_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_talks_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_talksrelated_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_talksreviews_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_telescope_entries_tags_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_telescope_monitoring_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_testimonials_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_tickets_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_ticketsreplay_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_transactions_table',1);
insert into migrations(migration, batch) values('2022_08_10_151715_create_users_table',1);
insert into migrations(migration, batch) values('2022_08_10_151716_add_foreign_keys_to_telescope_entries_tags_table',1);






insert into migrations(migration, batch) values('2016_06_01_000001_create_oauth_auth_codes_table',1);
insert into migrations(migration, batch) values('2016_06_01_000002_create_oauth_access_tokens_table',1);
insert into migrations(migration, batch) values('2016_06_01_000003_create_oauth_refresh_tokens_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_becomeinstructor_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_businesscourses_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_businessdata_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_businessdomains_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_businessgroups_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_businessgroupscourses_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_businessgroupsusers_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_businessinputfields_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_businessinputfieldsresponses_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_businessuserspendingemails_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_careers_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_careersresponses_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_categorie_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_categories_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_certificates_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_certificatescontainer_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_certificatesenrollment_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_command_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_contacts_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_countries_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_courseenrollment_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_courseincludes_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_courselectures_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_coursenotes_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_courserelated_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_coursereport_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_courseresources_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_coursereviews_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_courses_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_coursesections_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_coursesrelatedevents_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_coursewishlist_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_directpayauth_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_dynamic_fields_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_events_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_eventsdata_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_eventsenrollment_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_eventsreviews_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_eventstickets_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_faq_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_group_role_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_groups_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_homesettings_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_institution_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_items_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_lecturequestions_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_lecturequestionsanswers_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_lectures3d_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_link_views_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_links_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_logs_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_masterrequest_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_menu_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_oauth_access_tokens_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_oauth_auth_codes_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_oauth_refresh_tokens_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_orders_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_ordersposition_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_page_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_pagecomment_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_pagerate_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_partners_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_partnership_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_password_resets_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_paymentmethods_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_payments_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_permission_group_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_permission_role_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_permission_user_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_permissions_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_posts_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_progress_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_promotionactive_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_promotionevents_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_promotions_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_promotionusers_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_quiz_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_quizquestions_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_quizquestionschoice_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_quizstudentsanswers_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_quizstudentsstatus_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_relations_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_role_user_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_roles_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_searchkeys_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_setting_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_slider_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_social_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_talklikes_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_talks_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_talksrelated_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_talksreviews_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_testimonials_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_tickets_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_ticketsreplay_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_transactions_table',1);
insert into migrations(migration, batch) values('2022_10_24_142918_create_users_table',1);


INSERT INTO `items` (`id`, `name`, `link`, `type`, `icon`, `parent_id`, `order`, `controller_path`, `menu_id`, `created_at`, `updated_at`) VALUES (NULL, '{\"en\":\"Consultations\",\"ar\":\"Consultations\"}', '/lazyadmin/consultations', '', '<i class=\"material-icons\">control_point</i>', '0', '144', '[\"App\\\\Application\\\\Controllers\\\\Admin\\\\ConsultationsController\"]', '1', NULL, NULL);


############### 15/01/2023 Blog Posts and Categories ##############
INSERT INTO `items` (`id`, `name`, `link`, `type`, `icon`, `parent_id`, `order`, `controller_path`, `menu_id`, `created_at`, `updated_at`) VALUES (NULL, '{\"en\":\"Blog Posts\",\"ar\":\"Blog Posts\"}', '/lazyadmin/blogposts', '', '<i class=\"material-icons\">control_point</i>', '0', '146', '[\"App\\\\Application\\\\Controllers\\\\Admin\\\\BlogpostsController\"]', '1', NULL, NULL), (NULL, '{\"en\":\"Blog Categories\",\"ar\":\"Blog Categories\"}', '/lazyadmin/blogcategories', '', '<i class=\"material-icons\">control_point</i>', '0', '147', '[\"App\\\\Application\\\\Controllers\\\\Admin\\\\BlogcategoriesController\"]', '1', NULL, NULL);

INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `controller_name`, `method_name`, `controller_type`, `permission`, `namespace`, `created_at`, `updated_at`) VALUES (NULL, 'admin-index-BlogpostsController', 'admin-index-BlogpostsController', NULL, 'BlogpostsController', 'index', 'admin', '1', 'App\\Application\\Controllers\\Admin\\BlogpostsController', NULL, NULL), (NULL, 'admin-show-BlogpostsController', 'admin-show-BlogpostsController', NULL, 'BlogpostsController', 'show', 'admin', '1', 'App\\Application\\Controllers\\Admin\\BlogpostsController', NULL, NULL), (NULL, 'admin-store-BlogpostsController', 'admin-store-BlogpostsController', NULL, 'BlogpostsController', 'store', 'admin', '1', 'App\\Application\\Controllers\\Admin\\BlogpostsController', NULL, NULL), (NULL, 'admin-update-BlogpostsController', 'admin-update-BlogpostsController', NULL, 'BlogpostsController', 'update', 'admin', '1', 'App\\Application\\Controllers\\Admin\\BlogpostsController', NULL, NULL), (NULL, 'admin-getById-BlogpostsController', 'admin-getById-BlogpostsController', NULL, 'BlogpostsController', 'getById', 'admin', '1', 'App\\Application\\Controllers\\Admin\\BlogpostsController', NULL, NULL), (NULL, 'admin-destroy-BlogpostsController', 'admin-destroy-BlogpostsController', NULL, 'BlogpostsController', 'destroy', 'admin', '1', 'App\\Application\\Controllers\\Admin\\BlogpostsController', NULL, NULL), (NULL, 'admin-pluck-BlogpostsController', 'admin-pluck-BlogpostsController', NULL, 'BlogpostsController', 'pluck', 'admin', '1', 'App\\Application\\Controllers\\Admin\\BlogpostsController', NULL, NULL), (NULL, 'admin-index-BlogcategoriesController', 'admin-index-BlogcategoriesController', NULL, 'BlogcategoriesController', 'index', 'admin', '1', 'App\\Application\\Controllers\\Admin\\BlogcategoriesController', NULL, NULL), (NULL, 'admin-show-BlogcategoriesController', 'admin-show-BlogcategoriesController', NULL, 'BlogcategoriesController', 'show', 'admin', '1', 'App\\Application\\Controllers\\Admin\\BlogcategoriesController', NULL, NULL), (NULL, 'admin-store-BlogcategoriesController', 'admin-store-BlogcategoriesController', NULL, 'BlogcategoriesController', 'store', 'admin', '1', 'App\\Application\\Controllers\\Admin\\BlogcategoriesController', NULL, NULL), (NULL, 'admin-update-BlogcategoriesController', 'admin-update-BlogcategoriesController', NULL, 'BlogcategoriesController', 'update', 'admin', '1', 'App\\Application\\Controllers\\Admin\\BlogcategoriesController', NULL, NULL), (NULL, 'admin-getById-BlogcategoriesController', 'admin-getById-BlogcategoriesController', NULL, 'BlogcategoriesController', 'getById', 'admin', '1', 'App\\Application\\Controllers\\Admin\\BlogcategoriesController', NULL, NULL), (NULL, 'admin-destroy-BlogcategoriesController', 'admin-destroy-BlogcategoriesController', NULL, 'BlogcategoriesController', 'destroy', 'admin', '1', 'App\\Application\\Controllers\\Admin\\BlogcategoriesController', NULL, NULL), (NULL, 'admin-pluck-BlogcategoriesController', 'admin-pluck-BlogcategoriesController', NULL, 'BlogcategoriesController', 'pluck', 'admin', '1', 'App\\Application\\Controllers\\Admin\\BlogcategoriesController', NULL, NULL);


################# 1/3/2023 Additional Discounts ##############
INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `controller_name`, `method_name`, `controller_type`, `permission`, `namespace`, `created_at`, `updated_at`) VALUES (NULL, 'admin-index-AdditionaldiscountsController', 'admin-index-AdditionaldiscountsController', NULL, 'AdditionaldiscountsController', 'index', 'admin', '1', 'App\\Application\\Controllers\\Admin\\AdditionaldiscountsController', NULL, NULL), (NULL, 'admin-show-AdditionaldiscountsController', 'admin-show-AdditionaldiscountsController', NULL, 'AdditionaldiscountsController', 'show', 'admin', '1', 'App\\Application\\Controllers\\Admin\\AdditionaldiscountsController', NULL, NULL), (NULL, 'admin-store-AdditionaldiscountsController', 'admin-store-AdditionaldiscountsController', NULL, 'AdditionaldiscountsController', 'store', 'admin', '1', 'App\\Application\\Controllers\\Admin\\AdditionaldiscountsController', NULL, NULL), (NULL, 'admin-update-AdditionaldiscountsController', 'admin-update-AdditionaldiscountsController', NULL, 'AdditionaldiscountsController', 'update', 'admin', '1', 'App\\Application\\Controllers\\Admin\\AdditionaldiscountsController', NULL, NULL), (NULL, 'admin-getById-AdditionaldiscountsController', 'admin-getById-AdditionaldiscountsController', NULL, 'AdditionaldiscountsController', 'getById', 'admin', '1', 'App\\Application\\Controllers\\Admin\\AdditionaldiscountsController', NULL, NULL), (NULL, 'admin-destroy-AdditionaldiscountsController', 'admin-destroy-AdditionaldiscountsController', NULL, 'AdditionaldiscountsController', 'destroy', 'admin', '1', 'App\\Application\\Controllers\\Admin\\AdditionaldiscountsController', NULL, NULL), (NULL, 'admin-pluck-AdditionaldiscountsController', 'admin-pluck-AdditionaldiscountsController', NULL, 'AdditionaldiscountsController', 'pluck', 'admin', '1', 'App\\Application\\Controllers\\Admin\\AdditionaldiscountsController', NULL, NULL);

INSERT INTO `items` (`id`, `name`, `link`, `type`, `icon`, `parent_id`, `order`, `controller_path`, `menu_id`, `created_at`, `updated_at`) VALUES (NULL, '{\"en\":\"Additional Discounts\",\"ar\":\"Additional Discounts\"}', '/lazyadmin/additionaldiscounts', '', '<i class=\"material-icons\">control_point</i>', '0', '148', '[\"App\\\\Application\\\\Controllers\\\\Admin\\\\AdditionaldiscountsController\"]', '1', NULL, NULL);
