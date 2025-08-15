from odoo import http
from odoo.http import request
import json

class UserApiController(http.Controller):
    
    @http.route('/api/public/users', type='http', auth="public", methods=['GET'], csrf=False, website=True)
    def get_users(self, **kw):
        try:
            users = request.env['res.users'].sudo().search_read(
                [],  # Empty domain to get all users
                ['id', 'name', 'email'],  # Fields to return
                order='id desc'  # Order by ID descending
            )
            
            # Convert to list of dicts with proper field names
            user_data = [{
                'id': user['id'],
                'name': user['name'],
                'email': user['email'] or ''
            } for user in users]
            
            # Return as JSON with CORS headers
            return request.make_response(
                json.dumps({'status': 'success', 'data': user_data}),
                headers=[
                    ('Content-Type', 'application/json'),
                    ('Access-Control-Allow-Origin', '*'),
                    ('Access-Control-Allow-Methods', 'GET'),
                    ('Access-Control-Max-Age', '3600')
                ]
            )
            
        except Exception as e:
            return request.make_response(
                json.dumps({'status': 'error', 'message': str(e)}),
                headers=[('Content-Type', 'application/json')],
                status=500
            )
