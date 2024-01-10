<style><?php include 'css/ownPosts.css'; ?></style>

<h1>My Posts</h1>
<table class=mainTable>
        <thead>
            <tr>
                <th>ID</th>
                <th>Created on</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
<?
forEach($userPosts as $single) {
?>
        <tbody class="contentBox">
            <tr class="contentRow">
                <td><? echo $single->id ?></td>
                <td><? echo $single->created_on ?></td>
                <td><? echo $single->title ?></td>
                <td><? echo substr($single->content, 0, 100) ?>...</td>
                <td class="image-container">
                    <img src=<? echo $single->image ?> alt= 'no image found' class='table-image'>
                </td>
                <td>
                    <form action="/edit-post" method="get">
                        <input type="hidden" name="id" value="<? echo $single->id; ?>">
                        <button type="submit" class="btn btn-link">Edit</button>
                    </form>
                </td>
                <td>
                    <form action="/delete" method="post">
                        <input type="hidden" name="id" value="<? echo $single->id; ?>">
                        <button type="submit" class="btn btn-link">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
    <? } ?>
    </table>
    <a href="/create" class="btn btn-primary">Create new</a>