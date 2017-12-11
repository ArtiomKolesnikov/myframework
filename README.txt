- в action-ах controller-ов в св-ах this->view и this->layout можно переопределить шаблон и вид для конкретного
    action либо в самом классе текущего controller (его поля: view/layout)

- если не хочу подключать ни какой шаблон, н.п. ajax get/post, то в controller :: action
    $this->layout = false;