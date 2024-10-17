# set up
gcloud container clusters get-credentials infs-project-1 --zone=us-centralc-1
kubectl get node -o wide

git clone https://github.com/nawal-0/events.git
cd events

# build images
docker build -t gcr.io/infs-project-1/php-app .
docker push gcr.io/infs-project-1/php-app

docker build -t gcr.io/infs-project-1/my-nginx -f nginx-dockerfile .
docker push gcr.io/infs-project-1/my-nginx

# deploy & check
kubectl apply -f kubernetes/.

kubectl get services
kubectl get pods -o wide

# check reliability
kubectl cordon <node-name>
kubectl drain <node-name> --ignore-daemonsets
kubectl uncordon <node-name>

# manual scaling
kubectl scale deployment php-app --replicas=5
kubectl scale deployment nginx --replicas=5

# rollout
kubectl set image deployment/php-app php-app=gcr.io/infs-project-1/php-app:v2
kubectl set image deployment/nginx nginx=gcr.io/infs-project-1/my-nginx:v2

kubectl rollout status deployment/php-app
kubectl rollout status deployment/nginx

# rollback
kubectl rollout undo deployment/php-app
kubectl rollout undo deployment/nginx



