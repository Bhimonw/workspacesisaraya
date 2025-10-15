# workspacesisaraya

Mirror of local Laravel project 'ruangkerja-mvp' (partial backup). This repository will hold the source for the SISARAYA "ruangkerja-mvp" Laravel application.

Contents overview:
- app/
- bootstrap/
- config/
- database/
- public/
- resources/
- routes/
- tests/

How to push your local workspace:
1. Create a local git repo (if not already):
   git init
2. Add remote:
   git remote add origin https://github.com/Bhimonw/workspacesisaraya.git
3. Push:
   git add .
   git commit -m "Initial commit"
   git branch -M main
   git push -u origin main

Notes
- This repo is public.
- Be careful not to push secrets (env files, keys).