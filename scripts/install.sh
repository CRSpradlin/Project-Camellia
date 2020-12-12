sleep 2
cd /opt/drupal/web/modules/custom/camellia_module
bash /opt/drupal/web/modules/custom/camellia_module/install.sh
cd ./../../../../
drush site-install -y standard --db-url="mysql://user:password@drupal_db:3306/drupal" --site-name=Camellia
sleep 3
drush config-set -y system.performance css.preprocess 0
drush config-set -y system.performance js.preprocess 0
sleep 3
docker-php-ext-install mysqli
docker-php-ext-enable mysqli
echo ""
echo ""
echo "*****************"
echo "      Step 1     "
echo "*****************"
echo "Drupal has completed installation, look above for admin username and password." 
echo "Please save these somewhere before moving on." 
echo ""
echo "*****************"
echo "      Step 2     "
echo "*****************"
echo "Visit localhost in your browser to view the site and be sure you are not greeted with the setup screen."
echo ""
echo "*****************"
echo "      Step 3     "
echo "*****************"
echo "After you have done all of the above, please restart apache2 to finish the installation of drupal by running 'service apache2 restart'"
echo "(the drupal container will close but restart shortly after) then re-open the drupal container terminal."
echo ""
echo "*****************"
echo "      Step 4     "
echo "*****************"
echo "Edit your settings in the camellia_module/config/install/camellia_module.settings.yml to have your drupal module fully configured before install."
echo ""
echo ""