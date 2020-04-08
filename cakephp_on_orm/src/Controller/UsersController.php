<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $conn = ConnectionManager::get('default');
        // $limit = $this->request->getQuery('limit');
        // $offset = $this->request->getQuery('offset');       
        $users = $conn->execute("SELECT * FROM users")->fetchAll('assoc');
        // print_r($users);
        // $user = $this->paginate($this->Users);
        // print_r($user);
        // exit();

        // $this->set(compact('users'));
        

        $this->set('users',$users);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        // $user = $this->Users->get($id, [
        //     'contain' => ['Posts'],
        // ]);

        // $this->set('user', $user);

        $conn = ConnectionManager::get('default');
        
        $user = $conn->execute("SELECT a.*, b.id as pid, b.title, b.body, b.user_id, b.created as pcrt, b.modified as pmode FROM users a LEFT JOIN posts b ON a.id = b.user_id WHERE a.id = $id ")->fetchAll('assoc');

      
        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        // if ($this->request->is('post')) {
        //     $user = $this->Users->patchEntity($user, $this->request->getData());
        //     if ($this->Users->save($user)) {
        //         $this->Flash->success(__('The user has been saved.'));

        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('The user could not be saved. Please, try again.'));
        // }
        if($this->request->is('post')){
            
            $postd = $this->request->getData();

            $name = $postd['name'];
            $email = $postd['email'];
            $password = $postd['password'];
            $hasher = new DefaultPasswordHasher();
            $modified = date('Y-m-d H:i:s');
            $created =  date('Y-m-d H:i:s');

            //print_r($postd);
            //exit();
        
            $conn = ConnectionManager::get('default');
            //$auth = $conn->execute("SELECT email FROM users WHERE email = '$email'")->fetchAll('assoc');
            // print_r($auth);
            // exit();

            if($conn->execute("SELECT email FROM users WHERE email = '$email'")->fetchAll('assoc')){
                
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
                
            }
            else{
                $conn->insert('users', [
                'name' => $name,
                'email' => $email,
                'password' => $hasher->hash($password),
                'modified' => $modified,
                'created' => $created
                 ], ['created' => 'datetime']);
                //$conn->insert("INSERT INTO posts VALUES('',$title,$body,$uid,$modified,$created)");

                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        // if ($this->request->is(['patch', 'post', 'put'])) {
        //     $user = $this->Users->patchEntity($user, $this->request->getData());
        //     if ($this->Users->save($user)) {
        //         $this->Flash->success(__('The user has been saved.'));

        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('The user could not be saved. Please, try again.'));
        // }
        if($this->request->getData() == TRUE){
            
            $postd = $this->request->getData();

            $name = $postd['name'];
            $email = $postd['email'];
            $password = $postd['password'];
            $hasher = new DefaultPasswordHasher();
            $modified = date('Y-m-d H:i:s');
            // $created =  date('Y-m-d H:i:s');

            //print_r($postd);
            //exit();
        
            $conn = ConnectionManager::get('default');

            if($name != ""){
                
                $conn->update('users', [
                'name' => $name,
                'email' => $email,
                'password' => $hasher->hash($password),
                'modified' => $modified
                 ], ['id' => $id]);
                //$conn->insert("INSERT INTO posts VALUES('',$title,$body,$uid,$modified,$created)");

                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            else{
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $conn = ConnectionManager::get('default');
        if ($conn->delete('users', ['id' => $id])) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

     // Login funktion
     //validation, inloggningskontroll kollar användaren har rätt login
     public function login(){
        if($this->request->is('post')){   
            $check = $this->request->getData();
            $hasher = new DefaultPasswordHasher();
            

            $email = $check['email'];
            $pwd = $check['password'];
            $conn = ConnectionManager::get('default');
            $user = $conn->execute("SELECT * FROM users WHERE email = '$email'")->fetchAll('assoc');
            //print_r($user);
            $npwd = $user[0]['password'];
            //exit();
            if($hasher->check($pwd,$npwd)){
                $this->Auth->setUser($user[0]);
                return $this->redirect(['controller' => 'posts']);
            }
            else{
                // fel Login meddelande
                $this->Flash->error('Incorrect Login');
            }
            
        }
    }

     // Logout funktion
     public function logout(){
        $this->Flash->success('You are logged out');
        return $this->redirect($this->Auth->logout());
   }
    // registering funktion!
   public function register(){
    $user = $this->Users->newEntity();
    if($this->request->is('post')){
        
        $postd = $this->request->getData();

        $name = $postd['name'];
        $email = $postd['email'];
        $password = $postd['password'];
        $hasher = new DefaultPasswordHasher();
        $modified = date('Y-m-d H:i:s');
        $created =  date('Y-m-d H:i:s');
        $conn = ConnectionManager::get('default');
        if($conn->execute("SELECT email FROM users WHERE email = '$email'")->fetchAll('assoc')){

            $this->Flash->error(__('You are not registered'));

        }
        else{
            $conn->insert('users', [
            'name' => $name,
            'email' => $email,
            'password' => $hasher->hash($password),
            'modified' => $modified,
            'created' => $created ], ['created' => 'datetime']);
            $this->Flash->success(__('You are registered and can login'));
            return $this->redirect(['action' => 'index']);
        }
    }
    $this->set(compact('user'));
    $this->set('_serialzie', ['user']);
}
/**  function beforeFilter hjälper för att gäster registerar sig*/
public function beforeFilter(Event $event){
    $this->Auth->allow(['register']);
}
}
