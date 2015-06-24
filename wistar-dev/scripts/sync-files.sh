cd sites/default/files
rsync -rv -e"ssh -l wistar" primer:~/wistar.contextdevel.com/shared/files/* .
chmod -R 777 .
