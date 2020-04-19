<?php


namespace Controller;

use Core\Controller;
use Model\HistoryModel;
use Model\MemberModel;

class HistoryController extends Controller
{
    public function movieHistoryAction($id_film)
    {
        $this->user_is_log();
        $user_id = $_SESSION['user_id'];

        $membre = new MemberModel();
        $id_membre = $membre->get_membre($user_id);

        $params = $this->request->getQueryParams();

        if (!empty($params)) {
            $history = new HistoryModel([
                'id_film' => $id_film,
                'id_membre' => $id_membre['id_membre'],
                'avis' => $params['avis'],
            ]);

            $history->save();
        }
        header('location: ' . BASE_URI . '/history');
        die;
    }

    public function deleteHistoryAction($id_film)
    {
        $this->user_is_log();
        $user_id = $_SESSION['user_id'];

        $membre = new MemberModel();
        $id_membre = $membre->get_membre($user_id);

        $history = new HistoryModel();
        $history->delete($id_film, $id_membre['id_membre']);

        header('location: ' . BASE_URI . '/history');
        die;
    }

    public function historyAction()
    {
        $this->user_is_log();
        $user_id = $_SESSION['user_id'];

        $history = new HistoryModel();
        $my_history = $history->historique($user_id);

        $this->render('history', [
            'my_history' => $my_history,
        ]);
    }
}
