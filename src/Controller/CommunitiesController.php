<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Communities Controller
 *
 * @property \App\Model\Table\CommunitiesTable $Communities
 * @method \App\Model\Entity\Community[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CommunitiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $communities = $this->paginate($this->Communities);

        $this->set(compact('communities'));
    }

    /**
     * View method
     *
     * @param string|null $id Community id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $community = $this->Communities->get($id, [
            'contain' => ['Users' => 'Prices'],
        ]);

        $this->set(compact('community'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();
        $community = $this->Communities->newEmptyEntity();
        if ($this->request->is('post')) {
            $community = $this->Communities->patchEntity($community, $this->request->getData());
            if ($this->Communities->save($community)) {
                $this->Flash->success(__('The community has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The community could not be saved. Please, try again.'));
        }
        $users = $this->Communities->Users->find('list', ['limit' => 200]);
        $this->set(compact('community', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Community id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Authorization->skipAuthorization();
        $community = $this->Communities->get($id, [
            'contain' => ['Users'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $community = $this->Communities->patchEntity($community, $this->request->getData());
            if ($this->Communities->save($community)) {
                $this->Flash->success(__('The community has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The community could not be saved. Please, try again.'));
        }
        $users = $this->Communities->Users->find('list', ['limit' => 200]);
        $this->set(compact('community', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Community id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $community = $this->Communities->get($id);
        $this->Authorization->authorize($community);
        
        if ($this->Communities->delete($community)) {
            $this->Flash->success(__('The community has been deleted.'));
        } else {
            $this->Flash->error(__('The community could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Join community method
     * 
     * @param string|null $id Community id.
     * @return \Cake\Http\Response|null|void Flashes result and reloads page
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function join($id = null)
    {
        $this->request->allowMethod(['post']);
        $this->Authorization->skipAuthorization();
        $community = $this->Communities->get($id, [
            'contain' => ['Users'],
        ]);

        
        if ($this->request->is(['patch', 'post', 'put'])) {
            //Retrieve user entity
            $userId = $this->Authentication->getIdentity()->id;
            $user = $this->Communities->Users->get($userId);

            //Add the current user to the list of users in this community
            $this->Communities->Users->link($community, [$user]);

            $this->Flash->success(__('You successfully joined this community.'));
            return $this->redirect(['action' => 'view', $community->id]);
        }
    }
    
    /**
     * Leave community method
     * 
     * @param string|null $id Community id.
     * @return \Cake\Http\Response|null|void Flashes result and reloads page
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function leave($id = null)
    {
        $this->request->allowMethod(['post']);
        $this->Authorization->skipAuthorization();
        $community = $this->Communities->get($id, [
            'contain' => ['Users'],
        ]);

        
        if ($this->request->is(['patch', 'post', 'put'])) {
            //Retrieve user entity
            $userId = $this->Authentication->getIdentity()->id;
            $user = $this->Communities->Users->get($userId);

            //Add the current user to the list of users in this community
            $this->Communities->Users->unlink($community, [$user]);

            $this->Flash->success(__('You successfully left this community.'));
            return $this->redirect(['action' => 'view', $community->id]);
        }
    }
}
