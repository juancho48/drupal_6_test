role :web, "wistar.contextllc.com"
role :app, "wistar.contextllc.com"

namespace :deploy do

	set :user, "wistar"
	set :application, "wistar.contextllc.com"

	set :deploy_to, "/mnt/#{user}/#{application}"	
	set :use_sudo, false
	set :repository,  "git@office.contextllc.com:sites/wistar"
	set :scm, :git
	set :branch, 'staging'

	ssh_options[:forward_agent] = true

	task :finalize_update, :except => { :no_release => true } do
		run "ln -nfs #{shared_path}/files #{release_path}/sites/default/files"
		run "ln -nfs #{shared_path}/settings.php #{release_path}/sites/default/settings.php"
	end

	task :restart do end
end
