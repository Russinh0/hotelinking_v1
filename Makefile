backend-up:
	docker compose up backend nginx db


db-bash:
	docker exec -it db bash


down:
	docker compose down