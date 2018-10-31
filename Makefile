osx-local:
	@echo "\033[92mRequest sudo privileges\033[0m";
	sudo true;
	@echo "\033[92mConfigure /etc/hosts\033[0m";
	if ! grep -q "127.0.0.1 symfony-blog.ampdev.co" "/etc/hosts"; then echo "127.0.0.1 symfony-blog.ampdev.co" | sudo tee -a /etc/hosts; fi;
	make osx-link
	cp symfony-blog.conf /usr/local/etc/httpd/vhosts/
	sudo apachectl restart
	docker-compose --file=./docker-compose.yml up -d;

osx-link:
	@echo "\033[92mUnlink brew managed php versions\033[0m";
	php-unlinker.sh
	@echo "\033[92mBuild and link dependencies\033[0m";
	brew bundle -vvv
	brew link --force --overwrite $(shell grep -Eo 'amp-php.{0,4}' Brewfile | head -1) | head -1
