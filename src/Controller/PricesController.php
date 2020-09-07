<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Prices Controller
 *
 * @property \App\Model\Table\PricesTable $Prices
 * @method \App\Model\Entity\Price[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PricesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $prices = $this->paginate($this->Prices);

        $this->set(compact('prices'));
    }

    /**
     * View method
     *
     * @param string|null $id Price id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $price = $this->Prices->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('price'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();
        $price = $this->Prices->newEmptyEntity();
        if ($this->request->is('post')) {
            $price = $this->Prices->patchEntity($price, $this->request->getData());
            $price->user_id = $this->request->getAttribute('identity')->getIdentifier();

            if ($this->Prices->save($price)) {
                $this->Flash->success(__('The price has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The price could not be saved. Please, try again.'));
        }
        $users = $this->Prices->Users->find('list', ['limit' => 200]);
        $this->set(compact('price', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Price id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $price = $this->Prices->get($id, [
            'contain' => ['Users'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $price = $this->Prices->patchEntity($price, $this->request->getData(), [
                'accessibleFields' => ['user_id' => false]
            ]);
            if ($this->Prices->save($price)) {
                $this->Flash->success(__('The price has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The price could not be saved. Please, try again.'));
        }
        $users = $this->Prices->Users->find('list', ['limit' => 200]);
        $this->set(compact('price', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Price id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $price = $this->Prices->get($id);
        if ($this->Prices->delete($price)) {
            $this->Flash->success(__('The price has been deleted.'));
        } else {
            $this->Flash->error(__('The price could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
