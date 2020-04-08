<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 *
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    // $conn = ConnectionManager::get('default');
    public function index()
    {
        $conn = ConnectionManager::get('default');
        $posts = $conn->execute('SELECT * FROM posts')->fetchAll('assoc');
        

        $this->set('posts',$posts);
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $conn = ConnectionManager::get('default');
        $post = $conn->execute("SELECT a.*, b.name FROM posts a JOIN users b ON a.user_id = b.id WHERE a.id = $id ")->fetchAll('assoc');
        
        $this->set('post', $post[0]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->Posts->newEntity();
        
        if($this->request->getData() == TRUE){
            
            $postd = $this->request->getData();

            $title = $postd['title'];
            $body = $postd['body'];
            $uid = $postd['user_id'];
            $modified = date('Y-m-d H:i:s');
            $created =  date('Y-m-d H:i:s');
        
            $conn = ConnectionManager::get('default');

            if($title != ""){
                
                $conn->insert('posts', [
                'title' => $title,
                'body' => $body,
                'user_id' => $uid,
                'modified' => $modified,
                'created' => $created
                 ], ['created' => 'datetime']);
                //$conn->insert("INSERT INTO posts VALUES('',$title,$body,$uid,$modified,$created)");

                $this->Flash->success(__('The post has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            else{
                $this->Flash->error(__('The post could not be saved. Please, try again.'));
            }
        }        
        $users = $this->Posts->Users->find('list', ['limit' => 200]);
        $this->set(compact('post', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => [],
        ]);
        
        if($this->request->getData() == TRUE){
            
            $postd = $this->request->getData();

            $title = $postd['title'];
            $body = $postd['body'];
            $uid = $postd['user_id'];
            $modified = date('Y-m-d H:i:s');
            // $created =  date('Y-m-d H:i:s');
        
            $conn = ConnectionManager::get('default');

            if($title != ""){
                
                $conn->update('posts', [
                'title' => $title,
                'body' => $body,
                'user_id' => $uid,
                'modified' => $modified
                 ], ['id' => $id]);

                $this->Flash->success(__('The post has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            else{
                $this->Flash->error(__('The post could not be saved. Please, try again.'));
            }
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200]);
        $this->set(compact('post', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        $conn = ConnectionManager::get('default');
        if ($conn->delete('posts', ['id' => $id])) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
