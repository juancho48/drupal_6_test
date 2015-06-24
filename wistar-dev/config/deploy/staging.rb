role :web, "primer"
role :app, "primer"

namespace :deploy do

	set :user, "wistar"
	set :application, "wistar.contextdevel.com"

	set :deploy_to, "/home/#{user}/#{application}"	
	set :use_sudo, false
	set :repository,  "git@primer:sites/wistar"
	set :scm, :git
	set :branch, 'staging'

	ssh_options[:forward_agent] = true

	task :finalize_update, :except => { :no_release => true } do
		# run "ln -nfs #{shared_path}/.htaccess #{release_path}/.htaccess"
		run "ln -nfs #{shared_path}/files #{release_path}/sites/default/files"
		run "ln -nfs #{shared_path}/settings.php #{release_path}/sites/default/settings.php"
		run "ln -nfs #{shared_path}/robots.txt #{release_path}/robots.txt"
		run "cd #{release_path} && drush cache clear"
	end

	task :restart do end
end

namespace :less do
	task :compile do 
		if ENV.has_key?('FILE') and ENV['FILE'] =~ /\S+\.less/
			p "Compiling the less file: sites/all/themes/wistar/css/#{ENV['FILE']}..." 
			file_base = ENV['FILE'].split('.').first
			system "php scripts/compile-less.php sites/all/themes/wistar/css/#{file_base}.less sites/all/themes/wistar/css/#{file_base}.css"
		else
			puts 'Specify a LESS file to compile: cap less:compile FILE=file.less where file.less is relative to the wistar theme css path'
		end	
	end
end

namespace :files do
	task :pull do		
		system 'cd sites/default/files && rsync -rav --exclude=less/ -e"ssh -l wistar" primer:~/wistar.contextdevel.com/shared/files/* ./'
	end

	task :push do		
		system 'cd sites/default/files && rsync -rav --exclude=less/ -e"ssh -l wistar" ./* primer:~/wistar.contextdevel.com/shared/files/'
	end
end
